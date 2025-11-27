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
        ]);

        /* act */
        $result = $this->invoiceService->getInvoicePdf($invoice->id, 'stream');

        /* assert */
        $this->assertNotNull($result);
    }

    /** @test */
    public function it_can_get_invoice_pdf_download(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $invoice = Invoice::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'INV-TEST-002',
        ]);

        /* act */
        $result = $this->invoiceService->getInvoicePdf($invoice->id, 'download');

        /* assert */
        $this->assertNotNull($result);
    }

    /** @test */
    public function it_can_get_invoice_pdf_attach(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $invoice = Invoice::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'INV-TEST-003',
        ]);

        /* act */
        $result = $this->invoiceService->getInvoicePdf($invoice->id, 'attach');

        /* assert */
        $this->assertNotNull($result);
        $this->assertIsString($result);
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
        ]);

        Transaction::factory()->count(3)->create([
            'invoice_id' => $invoice->id,
            'type' => 'income',
        ]);

        /* act */
        $payments = $this->invoiceService->getInvoicePayments($invoice->id);

        /* assert */
        $this->assertCount(3, $payments);
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
    }

    /** @test */
    public function it_can_get_single_invoice(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $invoice = Invoice::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'INV-123',
        ]);

        /* act */
        $result = $this->invoiceService->getInvoice($invoice->id);

        /* assert */
        $this->assertNotNull($result);
        $this->assertEquals('INV-123', $result->number);
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
        ];

        /* act */
        $result = $this->invoiceService->createInvoice($invoiceData);

        /* assert */
        $this->assertNotNull($result);
        $this->assertDatabaseHas('invoices', [
            'number' => 'INV-NEW-001',
            'total' => 1000.00,
        ]);
    }

    /** @test */
    public function it_can_update_invoice(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $invoice = Invoice::factory()->create([
            'partner_id' => $partner->id,
            'total' => 1000.00,
        ]);

        $updateData = [
            'total' => 1500.00,
            'notes' => 'Updated notes',
        ];

        /* act */
        $result = $this->invoiceService->updateInvoice($invoice->id, $updateData);

        /* assert */
        $this->assertNotNull($result);
        $invoice->refresh();
        $this->assertEquals(1500.00, $invoice->total);
        $this->assertEquals('Updated notes', $invoice->notes);
    }

    /** @test */
    public function it_can_delete_invoice(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $invoice = Invoice::factory()->create([
            'partner_id' => $partner->id,
        ]);

        /* act */
        $result = $this->invoiceService->deleteInvoice($invoice->id);

        /* assert */
        $this->assertTrue($result);
        $this->assertSoftDeleted('invoices', [
            'id' => $invoice->id,
        ]);
    }

    /** @test */
    public function it_can_get_invoice_number(): void
    {
        /* act */
        $result = $this->invoiceService->getInvoiceNumber();

        /* assert */
        $this->assertNotNull($result);
        $this->assertIsString($result);
    }
}
