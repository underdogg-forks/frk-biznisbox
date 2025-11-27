<?php

namespace App\Filament\Resources\Admin\Settings\Pages;

use App\Filament\Resources\Admin\Settings\Actions\PreviewNumberingAction;
use App\Filament\Resources\Admin\Settings\Actions\RemoveCompanyLogoAction;
use App\Filament\Resources\Admin\Settings\Actions\TestEmailAction;
use App\Filament\Resources\Admin\Settings\Actions\UploadCompanyLogoAction;
use App\Filament\Resources\Admin\Settings\SettingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSettings extends ListRecords
{
    protected static string $resource = SettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            TestEmailAction::make(),
            PreviewNumberingAction::make(),
            UploadCompanyLogoAction::make(),
            RemoveCompanyLogoAction::make(),
            CreateAction::make(),
        ];
    }
}
