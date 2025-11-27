<?php

namespace App\Services;

use App\Models\Quote;
use App\Services\Concerns\GeneratesPdf;
use App\Services\Concerns\SendsNotifications;

class QuoteService
{
    use GeneratesPdf;
    use SendsNotifications;

    public function __construct(
        private readonly Quote $quoteModel
    ) {
    }

    public function getQuotes()
    {
        return $this->quoteModel->getQuotes();
    }

    public function getQuote($id)
    {
        return $this->quoteModel->getQuote($id);
    }

    public function createQuote($data)
    {
        return $this->quoteModel->createQuote($data);
    }

    public function updateQuote($id, $data)
    {
        return $this->quoteModel->updateQuote($id, $data);
    }

    public function deleteQuote($id)
    {
        return $this->quoteModel->deleteQuote($id);
    }

    public function getQuoteNumber()
    {
        return $this->quoteModel->getQuoteNumber();
    }

    public function shareQuote($id)
    {
        return $this->quoteModel->shareQuote($id);
    }

    public function convertQuoteToInvoice($id)
    {
        return $this->quoteModel->convertQuoteToInvoice($id);
    }

    /**
     * Get quote PDF.
     *
     * @param string $id   Quote ID
     * @param string $type Type of PDF (stream, download, attach)
     *
     * @return mixed PDF output based on type
     */
    public function getQuotePdf($id, $type = 'stream')
    {
        $quote = $this->quoteModel->getQuote($id);

        return $this->generatePdf(
            document: $quote,
            view: 'pdfs.quote',
            type: $type,
            filename: 'Quote',
            activity: $type === 'download' ? 'DownloadQuote' : 'ViewQuote',
            model: Quote::class
        );
    }

    /**
     * Send quote notification.
     *
     * @param string      $quote_id Quote ID
     * @param object|null $contact  Contact object (optional)
     *
     * @return bool
     */
    public function sendQuoteNotification($quote_id, $contact = null): bool
    {
        $quote = $this->quoteModel->getClientQuote($quote_id);

        $result = $this->sendDocumentNotification(
            document: $quote,
            documentType: 'quote',
            mailClass: \App\Mail\Client\QuoteNotification::class,
            contact: $contact
        );

        if (! $result) {
            return false;
        }

        $this->updateStatusAfterNotification(
            document: $quote,
            excludeStatuses: ['accepted', 'converted', 'sent', 'rejected']
        );

        createActivityLog('sendQuoteNotification', $quote->id, Quote::class, 'Quote');

        return true;
    }
}
