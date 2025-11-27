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
}
