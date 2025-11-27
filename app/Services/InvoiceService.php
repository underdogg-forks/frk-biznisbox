<?php

namespace App\Services;

use App\Models\Invoice;
use App\Models\Transaction;
use App\Services\Concerns\GeneratesPdf;
use App\Services\Concerns\SendsNotifications;

class InvoiceService
{
    use GeneratesPdf;
    use SendsNotifications;

    public function __construct(
        private readonly Invoice $invoiceModel
    ) {
    }

    public function getInvoices()
    {
        return $this->invoiceModel->getInvoices();
    }

    public function getInvoice($id)
    {
        return $this->invoiceModel->getInvoice($id);
    }

    public function createInvoice($data)
    {
        return $this->invoiceModel->createInvoice($data);
    }

    public function updateInvoice($id, $data)
    {
        return $this->invoiceModel->updateInvoice($id, $data);
    }

    public function deleteInvoice($id)
    {
        return $this->invoiceModel->deleteInvoice($id);
    }

    public function getInvoiceNumber()
    {
        return $this->invoiceModel->getInvoiceNumber();
    }

    public function shareInvoice($id)
    {
        return $this->invoiceModel->shareInvoice($id);
    }

    /**
     * Get invoice PDF.
     *
     * @param string $id   Invoice ID
     * @param string $type Type of PDF (stream, download, attach)
     *
     * @return mixed PDF output based on type
     */
    public function getInvoicePdf($id, $type = 'stream')
    {
        $invoice = $this->getInvoice($id);

        if (! $invoice) {
            abort(404, 'Invoice not found');
        }

        return $this->generatePdf(
            document: $invoice,
            view: 'pdfs.invoice',
            type: $type,
            filename: 'Invoice',
            activity: $type === 'download' ? 'DownloadInvoice' : 'ViewInvoice',
            model: Invoice::class
        );
    }

    /**
     * Add invoice payment.
     *
     * @param string $invoice_id Invoice ID
     * @param array  $data       Payment data
     *
     * @return Transaction|null
     */
    public function addInvoicePayment($invoice_id, $data): ?Transaction
    {
        $invoice = $this->invoiceModel->find($invoice_id);

        if (! $invoice) {
            return null;
        }

        $transaction = Transaction::create([
            'number'        => Transaction::getTransactionNumber(),
            'type'          => 'income',
            'amount'        => $data['amount'],
            'date'          => $data['date'] ?? date('Y-m-d'),
            'invoice_id'    => $invoice_id,
            'customer_id'   => $invoice->customer_id,
            'supplier_id'   => $invoice->payer_id,
            'currency'      => $invoice->currency,
            'currency_rate' => $invoice->currency_rate,
        ]);

        if (! $transaction) {
            return null;
        }

        $this->updateInvoiceStatus($invoice);

        incrementLastItemNumber('transaction');
        createActivityLog('addInvoicePayment', $invoice_id, Invoice::class, 'Invoice');
        sendWebhookForEvent('invoice:payment_received', $transaction->toArray());

        return $transaction;
    }

    /**
     * Update invoice status based on payment total.
     */
    private function updateInvoiceStatus(Invoice $invoice): void
    {
        $transactions = Transaction::where('invoice_id', $invoice->id)->get();
        $total        = 0;

        foreach ($transactions as $transaction) {
            $total += $transaction->type === 'income' ? $transaction->amount : -$transaction->amount;
        }

        // Use bccomp for safe monetary comparison (scale 2 for cents precision)
        $comparison = bccomp((string) $total, (string) $invoice->total, 2);

        $invoice->status = match (true) {
            $comparison === 0                                      => 'paid',
            $comparison > 0                                        => 'overpaid',
            $total > 0 && bccomp((string) $total, (string) $invoice->total, 2) < 0 => 'partial',
            default                                                => $invoice->status,
        };

        $invoice->save();
    }

    /**
     * Get invoice payments.
     *
     * @param string $invoice_id Invoice ID
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getInvoicePayments($invoice_id)
    {
        $invoice = $this->invoiceModel->findOrFail($invoice_id);

        return $invoice->transactions;
    }

    /**
     * Send invoice notification.
     *
     * @param string      $invoice_id Invoice ID
     * @param object|null $contact    Contact object (optional)
     *
     * @return bool
     */
    public function sendInvoiceNotification($invoice_id, $contact = null): bool
    {
        $invoice = $this->invoiceModel->getClientInvoice($invoice_id);

        $result = $this->sendDocumentNotification(
            document: $invoice,
            documentType: 'invoice',
            mailClass: \App\Mail\Client\InvoiceNotification::class,
            contact: $contact
        );

        if (! $result) {
            return false;
        }

        $this->updateStatusAfterNotification(
            document: $invoice,
            excludeStatuses: ['paid', 'overpaid', 'partial', 'sent']
        );

        createActivityLog('sendInvoiceNotification', $invoice_id, Invoice::class, 'Invoice');

        return true;
    }
}
