<?php

namespace App\Filament\Client\Pages;

use Filament\Pages\Page;
use App\Models\Contract;
use Filament\Notifications\Notification;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;

class ViewContractPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string $view = 'filament.client.pages.view-contract';
    
    protected static bool $shouldRegisterNavigation = false;

    public ?Contract $contract = null;
    public ?string $shareKey = null;
    public ?string $signature = null;

    public function mount(): void
    {
        $this->shareKey = request()->query('key');
        
        // TODO: Implement actual contract retrieval from Client\ContractController@getContract
        // This is a placeholder implementation
        
        if ($this->shareKey) {
            $this->contract = Contract::where('share_key', $this->shareKey)->first();
        }
        
        if (!$this->contract) {
            abort(404, 'Contract not found');
        }
    }

    public function getTitle(): string
    {
        return 'Contract ' . ($this->contract->number ?? '');
    }

    public function signContract(): void
    {
        // TODO: Implement actual contract signing from Client\ContractController@signContract
        // This is a placeholder implementation
        
        Notification::make()
            ->title('Contract Signed')
            ->body('Contract has been signed successfully')
            ->success()
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
