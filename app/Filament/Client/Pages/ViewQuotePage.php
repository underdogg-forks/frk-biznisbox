<?php

namespace App\Filament\Client\Pages;

use Filament\Pages\Page;
use App\Models\Quote;
use Filament\Notifications\Notification;

class ViewQuotePage extends Page
{
    protected static string $view = 'filament.client.pages.view-quote';
    
    protected static bool $shouldRegisterNavigation = false;

    public ?Quote $quote = null;
    public ?string $shareKey = null;

    public function mount(): void
    {
        $this->shareKey = request()->query('key');
        
        // TODO: Implement actual quote retrieval from Client\QuoteController@getQuote
        // This is a placeholder implementation
        
        if ($this->shareKey) {
            $this->quote = Quote::where('share_key', $this->shareKey)->first();
        }
        
        if (!$this->quote) {
            abort(404, 'Quote not found');
        }
    }

    public function getTitle(): string
    {
        return 'Quote ' . ($this->quote->number ?? '');
    }

    public function acceptQuote(): void
    {
        // TODO: Implement actual quote acceptance from Client\QuoteController@acceptRejectQuote
        // This is a placeholder implementation
        
        Notification::make()
            ->title('Quote Accepted')
            ->body('Quote has been accepted successfully')
            ->success()
            ->send();
    }

    public function rejectQuote(): void
    {
        // TODO: Implement actual quote rejection from Client\QuoteController@acceptRejectQuote
        // This is a placeholder implementation
        
        Notification::make()
            ->title('Quote Rejected')
            ->body('Quote has been rejected')
            ->warning()
            ->send();
    }

    public function downloadPdf(): void
    {
        // TODO: Implement PDF download
        Notification::make()
            ->title('Downloading PDF')
            ->success()
            ->send();
    }
}
