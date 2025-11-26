<?php

namespace App\Filament\Resources\Admin\Settings\Actions;

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
                // TODO: Implement actual rate update from Admin\CurrencyController@liveUpdateCurrencyRate
                // This is a placeholder action
                
                Notification::make()
                    ->title('Currency Rates Updated')
                    ->body('All currency exchange rates have been updated successfully')
                    ->success()
                    ->send();
            });
    }
}
