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
            'total' => 1800.00,
            'currency' => 'GBP',
        ]);

        /* act */
        $result = $this->billService->getBillPdf($bill->id, 'stream');

        /* assert */
        $this->assertNotNull($result);
        $this->assertInstanceOf(\Illuminate\Http\Response::class, $result);
        // Verify activity log was created
        $this->assertDatabaseHas('activity_logs', [
            'event' => 'ViewBill',
            'subject_id' => $bill->id,
            'subject_type' => 'App\Models\Bill',
        ]);
    }

    /** @test */
    public function it_can_get_bill_pdf_download(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $bill = Bill::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'BILL-TEST-002',
            'total' => 2800.00,
        ]);

        /* act */
        $result = $this->billService->getBillPdf($bill->id, 'download');

        /* assert */
        $this->assertNotNull($result);
        $this->assertInstanceOf(\Illuminate\Http\Response::class, $result);
        // Verify activity log was created for download
        $this->assertDatabaseHas('activity_logs', [
            'event' => 'DownloadBill',
            'subject_id' => $bill->id,
            'subject_type' => 'App\Models\Bill',
        ]);
    }

    /** @test */
    public function it_can_get_bill_pdf_attach(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $bill = Bill::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'BILL-TEST-003',
            'total' => 3800.00,
        ]);

        /* act */
        $result = $this->billService->getBillPdf($bill->id, 'attach');

        /* assert */
        $this->assertNotNull($result);
        $this->assertIsString($result);
        // PDF output should start with PDF header
        $this->assertStringStartsWith('%PDF', $result);
        // Should contain bill number
        $this->assertStringContainsString('BILL-TEST-003', $result);
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
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $result);
        // Verify all returned items are Bill instances
        $result->each(function ($bill) {
            $this->assertInstanceOf(Bill::class, $bill);
        });
    }

    /** @test */
    public function it_can_get_single_bill(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $bill = Bill::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'BILL-123',
            'total' => 4500.00,
            'status' => 'unpaid',
        ]);

        /* act */
        $result = $this->billService->getBill($bill->id);

        /* assert */
        $this->assertNotNull($result);
        $this->assertInstanceOf(Bill::class, $result);
        $this->assertEquals('BILL-123', $result->number);
        $this->assertEquals(4500.00, $result->total);
        $this->assertEquals('unpaid', $result->status);
        $this->assertEquals($bill->id, $result->id);
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
            'currency' => 'USD',
        ];

        /* act */
        $result = $this->billService->createBill($billData);

        /* assert */
        $this->assertNotNull($result);
        $this->assertInstanceOf(Bill::class, $result);
        $this->assertDatabaseHas('bills', [
            'number' => 'BILL-NEW-001',
            'total' => 1000.00,
            'status' => 'draft',
            'currency' => 'USD',
        ]);
        // Verify the returned object matches what was created
        $this->assertEquals('BILL-NEW-001', $result->number);
        $this->assertEquals(1000.00, $result->total);
        $this->assertNotNull($result->id);
    }

    /** @test */
    public function it_can_update_bill(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $bill = Bill::factory()->create([
            'partner_id' => $partner->id,
            'total' => 1000.00,
            'status' => 'draft',
            'notes' => 'Original notes',
        ]);

        $updateData = [
            'total' => 1500.00,
            'notes' => 'Updated notes',
        ];

        /* act */
        $result = $this->billService->updateBill($bill->id, $updateData);

        /* assert */
        $this->assertNotNull($result);
        $this->assertInstanceOf(Bill::class, $result);
        $bill->refresh();
        $this->assertEquals(1500.00, $bill->total);
        $this->assertEquals('Updated notes', $bill->notes);
        // Original status should remain unchanged if not in update data
        $this->assertEquals('draft', $bill->status);
        // ID should remain the same
        $this->assertEquals($bill->id, $result->id);
    }

    /** @test */
    public function it_can_delete_bill(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $bill = Bill::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'BILL-DELETE-001',
        ]);
        $billId = $bill->id;

        /* act */
        $this->billService->deleteBill($bill->id);

        /* assert */
        $this->assertSoftDeleted('bills', [
            'id' => $billId,
        ]);
        // Verify the bill can't be found with standard queries
        $this->assertNull(Bill::find($billId));
        // But exists with trashed
        $this->assertNotNull(Bill::withTrashed()->find($billId));
    }

    /** @test */
    public function it_can_get_bill_number(): void
    {
        /* act */
        $result = $this->billService->getBillNumber();

        /* assert */
        $this->assertNotNull($result);
        $this->assertIsString($result);
        // Should follow a pattern (e.g., BILL-XXXX or similar)
        $this->assertMatchesRegularExpression('/[A-Z0-9-]+/', $result);
    }
}
