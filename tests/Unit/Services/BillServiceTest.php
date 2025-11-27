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

    /** @test */
    public function it_can_get_all_bills(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        Bill::factory()->count(5)->create([
            'partner_id' => $partner->id,
        ]);

        /* act */
        $result = $this->billService->getBills();

        /* assert */
        $this->assertNotNull($result);
        $this->assertCount(5, $result);
    }

    /** @test */
    public function it_can_get_single_bill(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $bill = Bill::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'BILL-123',
        ]);

        /* act */
        $result = $this->billService->getBill($bill->id);

        /* assert */
        $this->assertNotNull($result);
        $this->assertEquals('BILL-123', $result->number);
    }

    /** @test */
    public function it_returns_null_when_getting_non_existent_bill(): void
    {
        /* act */
        $result = $this->billService->getBill(99999);

        /* assert */
        $this->assertNull($result);
    }

    /** @test */
    public function it_can_create_bill(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $billData = [
            'partner_id' => $partner->id,
            'supplier_id' => $partner->id,
            'number' => 'BILL-NEW-001',
            'date' => now()->format('Y-m-d'),
            'due_date' => now()->addDays(30)->format('Y-m-d'),
            'total' => 1000.00,
            'status' => 'draft',
        ];

        /* act */
        $result = $this->billService->createBill($billData);

        /* assert */
        $this->assertNotNull($result);
        $this->assertDatabaseHas('bills', [
            'number' => 'BILL-NEW-001',
            'total' => 1000.00,
        ]);
    }

    /** @test */
    public function it_can_update_bill(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $bill = Bill::factory()->create([
            'partner_id' => $partner->id,
            'total' => 1000.00,
        ]);

        $updateData = [
            'total' => 1500.00,
            'notes' => 'Updated notes',
        ];

        /* act */
        $result = $this->billService->updateBill($bill->id, $updateData);

        /* assert */
        $this->assertNotNull($result);
        $bill->refresh();
        $this->assertEquals(1500.00, $bill->total);
        $this->assertEquals('Updated notes', $bill->notes);
    }

    /** @test */
    public function it_can_delete_bill(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $bill = Bill::factory()->create([
            'partner_id' => $partner->id,
        ]);

        /* act */
        $this->billService->deleteBill($bill->id);

        /* assert */
        $this->assertSoftDeleted('bills', [
            'id' => $bill->id,
        ]);
    }

    /** @test */
    public function it_can_get_bill_number(): void
    {
        /* act */
        $result = $this->billService->getBillNumber();

        /* assert */
        $this->assertNotNull($result);
        $this->assertIsString($result);
    }
}
