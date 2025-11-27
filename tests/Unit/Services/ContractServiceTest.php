<?php

namespace Tests\Unit\Services;

use App\Models\Contract;
use App\Models\Partner;
use App\Models\User;
use App\Services\ContractService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContractServiceTest extends TestCase
{
    use RefreshDatabase;

    protected ContractService $contractService;
    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->contractService = new ContractService();
        $this->user = User::factory()->create();
    }

    /** @test */
    public function it_can_share_contract(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $contract = Contract::factory()->create([
            'partner_id' => $partner->id,
        ]);

        /* act */
        $result = $this->contractService->shareContract($contract->id);

        /* assert */
        $this->assertNotNull($result);
        $this->assertArrayHasKey('share_key', $result);
        $contract->refresh();
        $this->assertNotNull($contract->share_key);
    }

    /** @test */
    public function it_returns_false_when_sharing_non_existent_contract(): void
    {
        /* act */
        $result = $this->contractService->shareContract(99999);

        /* assert */
        $this->assertFalse($result);
    }

    /** @test */
    public function it_can_get_contract_pdf_stream(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $contract = Contract::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'CNT-TEST-001',
            'total' => 15000.00,
            'currency' => 'EUR',
        ]);

        /* act */
        $result = $this->contractService->getContractPdf($contract->id, 'stream');

        /* assert */
        $this->assertNotNull($result);
        $this->assertInstanceOf(\Illuminate\Http\Response::class, $result);
        // Verify activity log was created
        $this->assertDatabaseHas('activity_logs', [
            'event' => 'ViewContract',
            'subject_id' => $contract->id,
            'subject_type' => 'App\Models\Contract',
        ]);
    }

    /** @test */
    public function it_can_get_contract_pdf_download(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $contract = Contract::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'CNT-TEST-002',
            'total' => 25000.00,
        ]);

        /* act */
        $result = $this->contractService->getContractPdf($contract->id, 'download');

        /* assert */
        $this->assertNotNull($result);
        $this->assertInstanceOf(\Illuminate\Http\Response::class, $result);
        // Verify activity log was created for download
        $this->assertDatabaseHas('activity_logs', [
            'event' => 'DownloadContract',
            'subject_id' => $contract->id,
            'subject_type' => 'App\Models\Contract',
        ]);
    }

    /** @test */
    public function it_can_get_contract_pdf_attach(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $contract = Contract::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'CNT-TEST-003',
            'total' => 35000.00,
        ]);

        /* act */
        $result = $this->contractService->getContractPdf($contract->id, 'attach');

        /* assert */
        $this->assertNotNull($result);
        $this->assertIsString($result);
        // PDF output should start with PDF header
        $this->assertStringStartsWith('%PDF', $result);
        // Should contain contract number
        $this->assertStringContainsString('CNT-TEST-003', $result);
    }

    /** @test */
    public function it_can_get_all_contracts(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        Contract::factory()->count(5)->create([
            'partner_id' => $partner->id,
        ]);

        /* act */
        $result = $this->contractService->getContracts();

        /* assert */
        $this->assertNotNull($result);
        $this->assertCount(5, $result);
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $result);
        // Verify all returned items are Contract instances
        $result->each(function ($contract) {
            $this->assertInstanceOf(Contract::class, $contract);
        });
    }

    /** @test */
    public function it_can_get_single_contract(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $contract = Contract::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'CNT-123',
            'total' => 18000.00,
            'status' => 'active',
        ]);

        /* act */
        $result = $this->contractService->getContract($contract->id);

        /* assert */
        $this->assertNotNull($result);
        $this->assertInstanceOf(Contract::class, $result);
        $this->assertEquals('CNT-123', $result->number);
        $this->assertEquals(18000.00, $result->total);
        $this->assertEquals('active', $result->status);
        $this->assertEquals($contract->id, $result->id);
    }

    /** @test */
    public function it_returns_null_when_getting_non_existent_contract(): void
    {
        /* act */
        $result = $this->contractService->getContract(99999);

        /* assert */
        $this->assertNull($result);
    }

    /** @test */
    public function it_can_create_contract(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $contractData = [
            'partner_id' => $partner->id,
            'customer_id' => $partner->id,
            'number' => 'CNT-NEW-001',
            'start_date' => now()->format('Y-m-d'),
            'end_date' => now()->addMonths(12)->format('Y-m-d'),
            'total' => 12000.00,
            'status' => 'draft',
            'currency' => 'GBP',
        ];

        /* act */
        $result = $this->contractService->createContract($contractData);

        /* assert */
        $this->assertNotNull($result);
        $this->assertInstanceOf(Contract::class, $result);
        $this->assertDatabaseHas('contracts', [
            'number' => 'CNT-NEW-001',
            'total' => 12000.00,
            'status' => 'draft',
            'currency' => 'GBP',
        ]);
        // Verify the returned object matches what was created
        $this->assertEquals('CNT-NEW-001', $result->number);
        $this->assertEquals(12000.00, $result->total);
        $this->assertNotNull($result->id);
    }

    /** @test */
    public function it_can_update_contract(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $contract = Contract::factory()->create([
            'partner_id' => $partner->id,
            'total' => 12000.00,
            'status' => 'draft',
            'notes' => 'Original notes',
        ]);

        $updateData = [
            'total' => 15000.00,
            'notes' => 'Updated notes',
        ];

        /* act */
        $result = $this->contractService->updateContract($contract->id, $updateData);

        /* assert */
        $this->assertNotNull($result);
        $this->assertInstanceOf(Contract::class, $result);
        $contract->refresh();
        $this->assertEquals(15000.00, $contract->total);
        $this->assertEquals('Updated notes', $contract->notes);
        // Original status should remain unchanged if not in update data
        $this->assertEquals('draft', $contract->status);
        // ID should remain the same
        $this->assertEquals($contract->id, $result->id);
    }

    /** @test */
    public function it_can_delete_contract(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $contract = Contract::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'CNT-DELETE-001',
        ]);
        $contractId = $contract->id;

        /* act */
        $result = $this->contractService->deleteContract($contract->id);

        /* assert */
        $this->assertTrue($result);
        $this->assertSoftDeleted('contracts', [
            'id' => $contractId,
        ]);
        // Verify the contract can't be found with standard queries
        $this->assertNull(Contract::find($contractId));
        // But exists with trashed
        $this->assertNotNull(Contract::withTrashed()->find($contractId));
    }

    /** @test */
    public function it_can_get_contract_number(): void
    {
        /* act */
        $result = $this->contractService->getContractNumber();

        /* assert */
        $this->assertNotNull($result);
        $this->assertIsString($result);
        // Should follow a pattern (e.g., CNT-XXXX or similar)
        $this->assertMatchesRegularExpression('/[A-Z0-9-]+/', $result);
    }
}
