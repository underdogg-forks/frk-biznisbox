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
        ]);

        /* act */
        $result = $this->contractService->getContractPdf($contract->id, 'stream');

        /* assert */
        $this->assertNotNull($result);
    }

    /** @test */
    public function it_can_get_contract_pdf_download(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $contract = Contract::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'CNT-TEST-002',
        ]);

        /* act */
        $result = $this->contractService->getContractPdf($contract->id, 'download');

        /* assert */
        $this->assertNotNull($result);
    }

    /** @test */
    public function it_can_get_contract_pdf_attach(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $contract = Contract::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'CNT-TEST-003',
        ]);

        /* act */
        $result = $this->contractService->getContractPdf($contract->id, 'attach');

        /* assert */
        $this->assertNotNull($result);
        $this->assertIsString($result);
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
    }

    /** @test */
    public function it_can_get_single_contract(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $contract = Contract::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'CNT-123',
        ]);

        /* act */
        $result = $this->contractService->getContract($contract->id);

        /* assert */
        $this->assertNotNull($result);
        $this->assertEquals('CNT-123', $result->number);
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
        ];

        /* act */
        $result = $this->contractService->createContract($contractData);

        /* assert */
        $this->assertNotNull($result);
        $this->assertDatabaseHas('contracts', [
            'number' => 'CNT-NEW-001',
            'total' => 12000.00,
        ]);
    }

    /** @test */
    public function it_can_update_contract(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $contract = Contract::factory()->create([
            'partner_id' => $partner->id,
            'total' => 12000.00,
        ]);

        $updateData = [
            'total' => 15000.00,
            'notes' => 'Updated notes',
        ];

        /* act */
        $result = $this->contractService->updateContract($contract->id, $updateData);

        /* assert */
        $this->assertNotNull($result);
        $contract->refresh();
        $this->assertEquals(15000.00, $contract->total);
        $this->assertEquals('Updated notes', $contract->notes);
    }

    /** @test */
    public function it_can_delete_contract(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $contract = Contract::factory()->create([
            'partner_id' => $partner->id,
        ]);

        /* act */
        $result = $this->contractService->deleteContract($contract->id);

        /* assert */
        $this->assertTrue($result);
        $this->assertSoftDeleted('contracts', [
            'id' => $contract->id,
        ]);
    }

    /** @test */
    public function it_can_get_contract_number(): void
    {
        /* act */
        $result = $this->contractService->getContractNumber();

        /* assert */
        $this->assertNotNull($result);
        $this->assertIsString($result);
    }
}
