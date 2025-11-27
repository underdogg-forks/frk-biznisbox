<?php

namespace App\Filament\Resources\Admin\Settings\Actions;

use App\Services\Admin\CurrencyService;
use Filament\Actions\Action;
use Filament\Notifications\Notification;

class UpdateCurrencyRatesAction
{
    public static function make(): Action
    {
        return Action::make('updateRates')
            ->label('Update Currency Rates')
            ->icon('heroicon-o-arrow-path')
            ->requiresConfirmation()
            ->modalHeading('Update Currency Exchange Rates')
            ->modalDescription('This will fetch the latest exchange rates from the currency provider.')
            ->action(function () {
                $currencyService = app(CurrencyService::class);
                
                try {
                    $result = $currencyService->liveUpdateCurrencyRate();
                    
                    Notification::make()
                        ->title('Currency Rates Updated')
                        ->body('All currency exchange rates have been updated successfully')
                        ->success()
                        ->send();
                } catch (\Exception $e) {
                    Notification::make()
                        ->title('Error')
                        ->body('Currency rates could not be updated: ' . $e->getMessage())
                        ->danger()
                        ->send();
                }
            });
    }
}
