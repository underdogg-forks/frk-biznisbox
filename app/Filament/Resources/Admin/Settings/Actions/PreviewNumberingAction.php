<?php

namespace App\Filament\Resources\Admin\Settings\Actions;

use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;

class PreviewNumberingAction
{
    public static function make(): Action
    {
        return Action::make('previewNumber')
            ->label('Preview Number Format')
            ->icon('heroicon-o-eye')
            ->form([
                Select::make('type')
                    ->label('Document Type')
                    ->required()
                    ->options([
                        'invoice' => 'Invoice',
                        'quote' => 'Quote',
                        'bill' => 'Bill',
                        'contract' => 'Contract',
                        'product' => 'Product',
                        'partner' => 'Partner',
                    ]),
                TextInput::make('prefix')
                    ->label('Prefix')
                    ->default('INV-'),
                TextInput::make('suffix')
                    ->label('Suffix')
                    ->default(''),
            ])
            ->action(function (array $data) {
                // TODO: Implement actual preview from Admin\SettingController@generatePreviewNumber
                // This is a placeholder action
                
                $preview = "{$data['prefix']}2024-0001{$data['suffix']}";
                
                Notification::make()
                    ->title('Number Preview')
                    ->body("Preview: {$preview}")
                    ->info()
                    ->send();
            });
    }
}
