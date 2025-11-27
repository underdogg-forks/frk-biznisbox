<?php

namespace App\Filament\Resources\Admin\Settings\Actions;

use App\Services\Admin\SettingService;
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
                TextInput::make('format')
                    ->label('Number Format')
                    ->required()
                    ->default('{year}-{number}')
                    ->helperText('Use {year}, {month}, {day}, {number} as placeholders'),
            ])
            ->action(function (array $data) {
                $settingService = app(SettingService::class);
                
                $preview = $settingService->generatePreviewNumber($data['format'], $data['type']);
                
                Notification::make()
                    ->title('Number Preview')
                    ->body("Preview: {$preview}")
                    ->info()
                    ->send();
            });
    }
}
