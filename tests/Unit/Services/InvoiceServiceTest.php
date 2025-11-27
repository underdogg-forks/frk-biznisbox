<?php

namespace Tests\Unit\Services;

use App\Models\Invoice;
use App\Models\Partner;
use App\Models\PartnerContact;
use App\Models\Transaction;
use App\Models\User;
use App\Services\InvoiceService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class InvoiceServiceTest extends TestCase
{
    use RefreshDatabase;

    protected InvoiceService $invoiceService;
    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->invoiceService = new InvoiceService();
        $this->user = User::factory()->create();
    }

    /** @test */
    public function it_can_share_invoice(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $invoice = Invoice::factory()->create([
            'partner_id' => $partner->id,
        ]);

        /* act */
        $result = $this->invoiceService->shareInvoice($invoice->id);

        /* assert */
        $this->assertNotNull($result);
        $this->assertArrayHasKey('share_key', $result);
        $invoice->refresh();
        $this->assertNotNull($invoice->share_key);
    }

    /** @test */
    public function it_returns_false_when_sharing_non_existent_invoice(): void
    {
        /* act */
        $result = $this->invoiceService->shareInvoice(99999);

        /* assert */
        $this->assertFalse($result);
    }

    /** @test */
    public function it_can_get_invoice_pdf_stream(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $invoice = Invoice::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'INV-TEST-001',
            'total' => 1500.00,
            'currency' => 'USD',
        ]);

        /* act */
        $result = $this->invoiceService->getInvoicePdf($invoice->id, 'stream');

        /* assert */
        $this->assertNotNull($result);
        $this->assertInstanceOf(\Illuminate\Http\Response::class, $result);
        // Verify activity log was created
        $this->assertDatabaseHas('activity_logs', [
            'event' => 'ViewInvoice',
            'subject_id' => $invoice->id,
            'subject_type' => 'App\Models\Invoice',
        ]);
    }

    /** @test */
    public function it_can_get_invoice_pdf_download(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $invoice = Invoice::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'INV-TEST-002',
            'total' => 2500.00,
        ]);

        /* act */
        $result = $this->invoiceService->getInvoicePdf($invoice->id, 'download');

        /* assert */
        $this->assertNotNull($result);
        $this->assertInstanceOf(\Illuminate\Http\Response::class, $result);
        // Verify activity log was created for download
        $this->assertDatabaseHas('activity_logs', [
            'event' => 'DownloadInvoice',
            'subject_id' => $invoice->id,
            'subject_type' => 'App\Models\Invoice',
        ]);
    }

    /** @test */
    public function it_can_get_invoice_pdf_attach(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $invoice = Invoice::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'INV-TEST-003',
            'total' => 3500.00,
        ]);

        /* act */
        $result = $this->invoiceService->getInvoicePdf($invoice->id, 'attach');

        /* assert */
        $this->assertNotNull($result);
        $this->assertIsString($result);
        // PDF output should start with PDF header
        $this->assertStringStartsWith('%PDF', $result);
        // Should contain invoice number
        $this->assertStringContainsString('INV-TEST-003', $result);
    }

    /** @test */
    public function it_can_add_invoice_payment(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $invoice = Invoice::factory()->create([
            'partner_id' => $partner->id,
            'customer_id' => $partner->id,
            'total' => 1000.00,
            'status' => 'unpaid',
        ]);

        $paymentData = [
            'amount' => 500.00,
            'date' => now()->format('Y-m-d'),
        ];

        /* act */
        $result = $this->invoiceService->addInvoicePayment($invoice->id, $paymentData);

        /* assert */
        $this->assertNotNull($result);
        $this->assertInstanceOf(Transaction::class, $result);
        $this->assertEquals(500.00, $result->amount);
        
        // Invoice status should be partial
        $invoice->refresh();
        $this->assertEquals('partial', $invoice->status);
    }

    /** @test */
    public function it_marks_invoice_as_paid_when_full_payment_received(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $invoice = Invoice::factory()->create([
            'partner_id' => $partner->id,
            'customer_id' => $partner->id,
            'total' => 1000.00,
            'status' => 'unpaid',
        ]);

        $paymentData = [
            'amount' => 1000.00,
            'date' => now()->format('Y-m-d'),
        ];

        /* act */
        $result = $this->invoiceService->addInvoicePayment($invoice->id, $paymentData);

        /* assert */
        $invoice->refresh();
        $this->assertEquals('paid', $invoice->status);
    }

    /** @test */
    public function it_marks_invoice_as_overpaid_when_payment_exceeds_total(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $invoice = Invoice::factory()->create([
            'partner_id' => $partner->id,
            'customer_id' => $partner->id,
            'total' => 1000.00,
            'status' => 'unpaid',
        ]);

        $paymentData = [
            'amount' => 1500.00,
            'date' => now()->format('Y-m-d'),
        ];

        /* act */
        $result = $this->invoiceService->addInvoicePayment($invoice->id, $paymentData);

        /* assert */
        $invoice->refresh();
        $this->assertEquals('overpaid', $invoice->status);
    }

    /** @test */
    public function it_can_send_invoice_notification_to_specific_contact(): void
    {
        /* arrange */
        Mail::fake();
        
        $partner = Partner::factory()->create();
        $invoice = Invoice::factory()->create([
            'partner_id' => $partner->id,
            'customer_id' => $partner->id,
        ]);
        
        $contact = PartnerContact::factory()->create([
            'partner_id' => $partner->id,
            'email' => 'test@example.com',
        ]);

        /* act */
        $result = $this->invoiceService->sendInvoiceNotification($invoice->id, $contact);

        /* assert */
        $this->assertTrue($result);
        Mail::assertSent(\App\Mail\Client\InvoiceNotification::class, function ($mail) use ($contact) {
            return $mail->hasTo($contact->email);
        });
    }

    /** @test */
    public function it_can_send_invoice_notification_to_primary_contacts(): void
    {
        /* arrange */
        Mail::fake();
        
        $partner = Partner::factory()->create();
        $invoice = Invoice::factory()->create([
            'partner_id' => $partner->id,
            'customer_id' => $partner->id,
        ]);
        
        $contact1 = PartnerContact::factory()->create([
            'partner_id' => $partner->id,
            'email' => 'contact1@example.com',
            'is_primary' => true,
        ]);
        
        $contact2 = PartnerContact::factory()->create([
            'partner_id' => $partner->id,
            'email' => 'contact2@example.com',
            'is_primary' => false,
        ]);

        /* act */
        $result = $this->invoiceService->sendInvoiceNotification($invoice->id);

        /* assert */
        $this->assertTrue($result);
        Mail::assertSent(\App\Mail\Client\InvoiceNotification::class, 1);
    }

    /** @test */
    public function it_updates_invoice_status_to_sent_after_notification(): void
    {
        /* arrange */
        Mail::fake();
        
        $partner = Partner::factory()->create();
        $invoice = Invoice::factory()->create([
            'partner_id' => $partner->id,
            'customer_id' => $partner->id,
            'status' => 'draft',
        ]);
        
        $contact = PartnerContact::factory()->create([
            'partner_id' => $partner->id,
            'email' => 'test@example.com',
            'is_primary' => true,
        ]);

        /* act */
        $this->invoiceService->sendInvoiceNotification($invoice->id);

        /* assert */
        $invoice->refresh();
        $this->assertEquals('sent', $invoice->status);
    }

    /** @test */
    public function it_can_get_invoice_payments(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $invoice = Invoice::factory()->create([
            'partner_id' => $partner->id,
            'customer_id' => $partner->id,
            'total' => 3000.00,
        ]);

        Transaction::factory()->count(3)->create([
            'invoice_id' => $invoice->id,
            'type' => 'income',
            'amount' => 1000.00,
        ]);

        /* act */
        $payments = $this->invoiceService->getInvoicePayments($invoice->id);

        /* assert */
        $this->assertCount(3, $payments);
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $payments);
        // Verify all payments are for this invoice
        $payments->each(function ($payment) use ($invoice) {
            $this->assertEquals($invoice->id, $payment->invoice_id);
            $this->assertEquals('income', $payment->type);
        });
    }

    /** @test */
    public function it_can_get_all_invoices(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        Invoice::factory()->count(5)->create([
            'partner_id' => $partner->id,
        ]);

        /* act */
        $result = $this->invoiceService->getInvoices();

        /* assert */
        $this->assertNotNull($result);
        $this->assertCount(5, $result);
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $result);
        // Verify all returned items are Invoice instances
        $result->each(function ($invoice) {
            $this->assertInstanceOf(Invoice::class, $invoice);
        });
    }

    /** @test */
    public function it_can_get_single_invoice(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $invoice = Invoice::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'INV-123',
            'total' => 5000.00,
            'currency' => 'EUR',
        ]);

        /* act */
        $result = $this->invoiceService->getInvoice($invoice->id);

        /* assert */
        $this->assertNotNull($result);
        $this->assertInstanceOf(Invoice::class, $result);
        $this->assertEquals('INV-123', $result->number);
        $this->assertEquals(5000.00, $result->total);
        $this->assertEquals('EUR', $result->currency);
        $this->assertEquals($invoice->id, $result->id);
    }

    /** @test */
    public function it_returns_null_when_getting_non_existent_invoice(): void
    {
        /* act */
        $result = $this->invoiceService->getInvoice(99999);

        /* assert */
        $this->assertNull($result);
    }

    /** @test */
    public function it_can_create_invoice(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $invoiceData = [
            'partner_id' => $partner->id,
            'customer_id' => $partner->id,
            'number' => 'INV-NEW-001',
            'date' => now()->format('Y-m-d'),
            'due_date' => now()->addDays(30)->format('Y-m-d'),
            'total' => 1000.00,
            'status' => 'draft',
            'currency' => 'USD',
        ];

        /* act */
        $result = $this->invoiceService->createInvoice($invoiceData);

        /* assert */
        $this->assertNotNull($result);
        $this->assertInstanceOf(Invoice::class, $result);
        $this->assertDatabaseHas('invoices', [
            'number' => 'INV-NEW-001',
            'total' => 1000.00,
            'status' => 'draft',
            'currency' => 'USD',
        ]);
        // Verify the returned object matches what was created
        $this->assertEquals('INV-NEW-001', $result->number);
        $this->assertEquals(1000.00, $result->total);
        $this->assertNotNull($result->id);
    }

    /** @test */
    public function it_can_update_invoice(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $invoice = Invoice::factory()->create([
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
        $result = $this->invoiceService->updateInvoice($invoice->id, $updateData);

        /* assert */
        $this->assertNotNull($result);
        $this->assertInstanceOf(Invoice::class, $result);
        $invoice->refresh();
        $this->assertEquals(1500.00, $invoice->total);
        $this->assertEquals('Updated notes', $invoice->notes);
        // Original status should remain unchanged if not in update data
        $this->assertEquals('draft', $invoice->status);
        // ID should remain the same
        $this->assertEquals($invoice->id, $result->id);
    }

    /** @test */
    public function it_can_delete_invoice(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $invoice = Invoice::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'INV-DELETE-001',
        ]);
        $invoiceId = $invoice->id;

        /* act */
        $result = $this->invoiceService->deleteInvoice($invoice->id);

        /* assert */
        $this->assertTrue($result);
        $this->assertSoftDeleted('invoices', [
            'id' => $invoiceId,
        ]);
        // Verify the invoice can't be found with standard queries
        $this->assertNull(Invoice::find($invoiceId));
        // But exists with trashed
        $this->assertNotNull(Invoice::withTrashed()->find($invoiceId));
    }

    /** @test */
    public function it_can_get_invoice_number(): void
    {
        /* act */
        $result = $this->invoiceService->getInvoiceNumber();

        /* assert */
        $this->assertNotNull($result);
        $this->assertIsString($result);
        // Should follow a pattern (e.g., INV-XXXX or similar)
        $this->assertMatchesRegularExpression('/[A-Z0-9-]+/', $result);
    }
}
