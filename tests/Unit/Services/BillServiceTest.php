<?php

namespace Tests\Unit\Services;

use App\Models\Bill;
use App\Models\Partner;
use App\Models\User;
use App\Services\BillService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BillServiceTest extends TestCase
{
    use RefreshDatabase;

    protected BillService $billService;
    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->billService = new BillService();
        $this->user = User::factory()->create();
    }

    /** @test */
    public function it_can_get_bill_pdf_stream(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $bill = Bill::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'BILL-TEST-001',
        ]);

        /* act */
        $result = $this->billService->getBillPdf($bill->id, 'stream');

        /* assert */
        $this->assertNotNull($result);
    }

    /** @test */
    public function it_can_get_bill_pdf_download(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $bill = Bill::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'BILL-TEST-002',
        ]);

        /* act */
        $result = $this->billService->getBillPdf($bill->id, 'download');

        /* assert */
        $this->assertNotNull($result);
    }

    /** @test */
    public function it_can_get_bill_pdf_attach(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $bill = Bill::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'BILL-TEST-003',
        ]);

        /* act */
        $result = $this->billService->getBillPdf($bill->id, 'attach');

        /* assert */
        $this->assertNotNull($result);
        $this->assertIsString($result);
    }
}
