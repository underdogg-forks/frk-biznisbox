<?php

namespace App\Filament\Client\Pages;

use Filament\Pages\Page;
use App\Models\Invoice;

class ViewInvoicePage extends Page
{
    protected static string $view = 'filament.client.pages.view-invoice';
    
    protected static bool $shouldRegisterNavigation = false;

    public ?Invoice $invoice = null;
    public ?string $shareKey = null;

    public function mount(): void
    {
        $this->shareKey = request()->query('key');
        
        // TODO: Implement actual invoice retrieval from Client\InvoiceController@getInvoice
        // This is a placeholder implementation
        
        if ($this->shareKey) {
            $this->invoice = Invoice::where('share_key', $this->shareKey)->first();
        }
        
        if (!$this->invoice) {
            abort(404, 'Invoice not found');
        }
    }

    public function getTitle(): string
    {
        return 'Invoice ' . ($this->invoice->number ?? '');
    }

    public function payWithStripe(): void
    {
        // TODO: Implement actual Stripe payment from Client\InvoiceController@payInvoiceStripe
        $this->notify('success', 'Stripe payment initiated');
    }

    public function payWithPayPal(): void
    {
        // TODO: Implement actual PayPal payment from Client\InvoiceController@payInvoicePayPal
        $this->notify('success', 'PayPal payment initiated');
    }

    public function downloadPdf(): void
    {
        // TODO: Implement PDF download
        $this->notify('success', 'Downloading PDF...');
    }
}
