<?php

namespace App\Filament\Client\Pages;

use Filament\Pages\Page;
use App\Models\SupportTicket;
use Filament\Notifications\Notification;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;

class ViewSupportTicketPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string $view = 'filament.client.pages.view-support-ticket';
    
    protected static bool $shouldRegisterNavigation = false;

    public ?SupportTicket $ticket = null;
    public ?string $shareKey = null;
    public ?string $message = null;

    public function mount(): void
    {
        $this->shareKey = request()->query('key');
        
        // TODO: Implement actual ticket retrieval from Client\SupportTicketController@getTicket
        // This is a placeholder implementation
        
        if ($this->shareKey) {
            $this->ticket = SupportTicket::where('share_key', $this->shareKey)->first();
        }
        
        if (!$this->ticket) {
            abort(404, 'Support ticket not found');
        }
    }

    public function getTitle(): string
    {
        return 'Support Ticket #' . ($this->ticket->number ?? '');
    }

    public function replyToTicket(): void
    {
        // TODO: Implement actual ticket reply from Client\SupportTicketController@replyToTicket
        // This is a placeholder implementation
        
        if (empty($this->message)) {
            Notification::make()
                ->title('Message Required')
                ->body('Please enter a message')
                ->danger()
                ->send();
            return;
        }
        
        Notification::make()
            ->title('Reply Sent')
            ->body('Your reply has been sent successfully')
            ->success()
            ->send();
        
        $this->message = null;
    }
}
