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
        ]);

        /* act */
        $result = $this->quoteService->getQuotePdf($quote->id, 'stream');

        /* assert */
        $this->assertNotNull($result);
    }

    /** @test */
    public function it_can_get_quote_pdf_download(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $quote = Quote::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'QTE-TEST-002',
        ]);

        /* act */
        $result = $this->quoteService->getQuotePdf($quote->id, 'download');

        /* assert */
        $this->assertNotNull($result);
    }

    /** @test */
    public function it_can_get_quote_pdf_attach(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $quote = Quote::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'QTE-TEST-003',
        ]);

        /* act */
        $result = $this->quoteService->getQuotePdf($quote->id, 'attach');

        /* assert */
        $this->assertNotNull($result);
        $this->assertIsString($result);
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
}
