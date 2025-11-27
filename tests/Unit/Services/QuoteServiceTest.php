<?php

namespace Tests\Unit\Services;

use App\Models\Invoice;
use App\Models\Partner;
use App\Models\PartnerContact;
use App\Models\Quote;
use App\Models\User;
use App\Services\QuoteService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class QuoteServiceTest extends TestCase
{
    use RefreshDatabase;

    protected QuoteService $quoteService;
    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->quoteService = new QuoteService();
        $this->user = User::factory()->create();
    }

    /** @test */
    public function it_can_share_quote(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $quote = Quote::factory()->create([
            'partner_id' => $partner->id,
        ]);

        /* act */
        $result = $this->quoteService->shareQuote($quote->id);

        /* assert */
        $this->assertNotNull($result);
        $this->assertArrayHasKey('share_key', $result);
        $quote->refresh();
        $this->assertNotNull($quote->share_key);
    }

    /** @test */
    public function it_returns_false_when_sharing_non_existent_quote(): void
    {
        /* act */
        $result = $this->quoteService->shareQuote(99999);

        /* assert */
        $this->assertFalse($result);
    }

    /** @test */
    public function it_can_convert_quote_to_invoice(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $quote = Quote::factory()->create([
            'partner_id' => $partner->id,
            'customer_id' => $partner->id,
            'status' => 'sent',
        ]);

        /* act */
        $result = $this->quoteService->convertQuoteToInvoice($quote->id);

        /* assert */
        $this->assertNotNull($result);
        $this->assertInstanceOf(Invoice::class, $result);
        $this->assertEquals($quote->customer_id, $result->customer_id);
        $this->assertEquals($quote->total, $result->total);
    }

    /** @test */
    public function it_returns_false_when_converting_non_existent_quote(): void
    {
        /* act */
        $result = $this->quoteService->convertQuoteToInvoice(99999);

        /* assert */
        $this->assertFalse($result);
    }

    /** @test */
    public function it_can_get_quote_pdf_stream(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $quote = Quote::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'QTE-TEST-001',
            'total' => 2500.00,
            'currency' => 'USD',
        ]);

        /* act */
        $result = $this->quoteService->getQuotePdf($quote->id, 'stream');

        /* assert */
        $this->assertNotNull($result);
        $this->assertInstanceOf(\Illuminate\Http\Response::class, $result);
        // Verify activity log was created
        $this->assertDatabaseHas('activity_logs', [
            'event' => 'ViewQuote',
            'subject_id' => $quote->id,
            'subject_type' => 'App\Models\Quote',
        ]);
    }

    /** @test */
    public function it_can_get_quote_pdf_download(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $quote = Quote::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'QTE-TEST-002',
            'total' => 3500.00,
        ]);

        /* act */
        $result = $this->quoteService->getQuotePdf($quote->id, 'download');

        /* assert */
        $this->assertNotNull($result);
        $this->assertInstanceOf(\Illuminate\Http\Response::class, $result);
        // Verify activity log was created for download
        $this->assertDatabaseHas('activity_logs', [
            'event' => 'DownloadQuote',
            'subject_id' => $quote->id,
            'subject_type' => 'App\Models\Quote',
        ]);
    }

    /** @test */
    public function it_can_get_quote_pdf_attach(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $quote = Quote::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'QTE-TEST-003',
            'total' => 4500.00,
        ]);

        /* act */
        $result = $this->quoteService->getQuotePdf($quote->id, 'attach');

        /* assert */
        $this->assertNotNull($result);
        $this->assertIsString($result);
        // PDF output should start with PDF header
        $this->assertStringStartsWith('%PDF', $result);
        // Should contain quote number
        $this->assertStringContainsString('QTE-TEST-003', $result);
    }

    /** @test */
    public function it_can_send_quote_notification_to_specific_contact(): void
    {
        /* arrange */
        Mail::fake();
        
        $partner = Partner::factory()->create();
        $quote = Quote::factory()->create([
            'partner_id' => $partner->id,
            'customer_id' => $partner->id,
        ]);
        
        $contact = PartnerContact::factory()->create([
            'partner_id' => $partner->id,
            'email' => 'test@example.com',
        ]);

        /* act */
        $result = $this->quoteService->sendQuoteNotification($quote->id, $contact);

        /* assert */
        $this->assertTrue($result);
        Mail::assertSent(\App\Mail\Client\QuoteNotification::class, function ($mail) use ($contact) {
            return $mail->hasTo($contact->email);
        });
    }

    /** @test */
    public function it_can_send_quote_notification_to_primary_contacts(): void
    {
        /* arrange */
        Mail::fake();
        
        $partner = Partner::factory()->create();
        $quote = Quote::factory()->create([
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
        $result = $this->quoteService->sendQuoteNotification($quote->id);

        /* assert */
        $this->assertTrue($result);
        Mail::assertSent(\App\Mail\Client\QuoteNotification::class, 1);
    }

    /** @test */
    public function it_updates_quote_status_to_sent_after_notification(): void
    {
        /* arrange */
        Mail::fake();
        
        $partner = Partner::factory()->create();
        $quote = Quote::factory()->create([
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
        $this->quoteService->sendQuoteNotification($quote->id);

        /* assert */
        $quote->refresh();
        $this->assertEquals('sent', $quote->status);
    }

    /** @test */
    public function it_can_get_all_quotes(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        Quote::factory()->count(5)->create([
            'partner_id' => $partner->id,
        ]);

        /* act */
        $result = $this->quoteService->getQuotes();

        /* assert */
        $this->assertNotNull($result);
        $this->assertCount(5, $result);
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $result);
        // Verify all returned items are Quote instances
        $result->each(function ($quote) {
            $this->assertInstanceOf(Quote::class, $quote);
        });
    }

    /** @test */
    public function it_can_get_single_quote(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $quote = Quote::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'QTE-123',
            'total' => 7500.00,
            'status' => 'sent',
        ]);

        /* act */
        $result = $this->quoteService->getQuote($quote->id);

        /* assert */
        $this->assertNotNull($result);
        $this->assertInstanceOf(Quote::class, $result);
        $this->assertEquals('QTE-123', $result->number);
        $this->assertEquals(7500.00, $result->total);
        $this->assertEquals('sent', $result->status);
        $this->assertEquals($quote->id, $result->id);
    }

    /** @test */
    public function it_returns_null_when_getting_non_existent_quote(): void
    {
        /* act */
        $result = $this->quoteService->getQuote(99999);

        /* assert */
        $this->assertNull($result);
    }

    /** @test */
    public function it_can_create_quote(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $quoteData = [
            'partner_id' => $partner->id,
            'customer_id' => $partner->id,
            'number' => 'QTE-NEW-001',
            'date' => now()->format('Y-m-d'),
            'valid_until' => now()->addDays(30)->format('Y-m-d'),
            'total' => 1000.00,
            'status' => 'draft',
            'currency' => 'EUR',
        ];

        /* act */
        $result = $this->quoteService->createQuote($quoteData);

        /* assert */
        $this->assertNotNull($result);
        $this->assertInstanceOf(Quote::class, $result);
        $this->assertDatabaseHas('quotes', [
            'number' => 'QTE-NEW-001',
            'total' => 1000.00,
            'status' => 'draft',
            'currency' => 'EUR',
        ]);
        // Verify the returned object matches what was created
        $this->assertEquals('QTE-NEW-001', $result->number);
        $this->assertEquals(1000.00, $result->total);
        $this->assertNotNull($result->id);
    }

    /** @test */
    public function it_can_update_quote(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $quote = Quote::factory()->create([
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
        $result = $this->quoteService->updateQuote($quote->id, $updateData);

        /* assert */
        $this->assertNotNull($result);
        $this->assertInstanceOf(Quote::class, $result);
        $quote->refresh();
        $this->assertEquals(1500.00, $quote->total);
        $this->assertEquals('Updated notes', $quote->notes);
        // Original status should remain unchanged if not in update data
        $this->assertEquals('draft', $quote->status);
        // ID should remain the same
        $this->assertEquals($quote->id, $result->id);
    }

    /** @test */
    public function it_can_delete_quote(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $quote = Quote::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'QTE-DELETE-001',
        ]);
        $quoteId = $quote->id;

        /* act */
        $result = $this->quoteService->deleteQuote($quote->id);

        /* assert */
        $this->assertTrue($result);
        $this->assertSoftDeleted('quotes', [
            'id' => $quoteId,
        ]);
        // Verify the quote can't be found with standard queries
        $this->assertNull(Quote::find($quoteId));
        // But exists with trashed
        $this->assertNotNull(Quote::withTrashed()->find($quoteId));
    }

    /** @test */
    public function it_can_get_quote_number(): void
    {
        /* act */
        $result = $this->quoteService->getQuoteNumber();

        /* assert */
        $this->assertNotNull($result);
        $this->assertIsString($result);
        // Should follow a pattern (e.g., QTE-XXXX or similar)
        $this->assertMatchesRegularExpression('/[A-Z0-9-]+/', $result);
    }
}
