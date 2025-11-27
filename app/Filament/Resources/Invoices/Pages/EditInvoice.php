<?php

namespace App\Filament\Resources\Invoices\Pages;

use App\Filament\Resources\Invoices\Actions\AddInvoicePaymentAction;
use App\Filament\Resources\Invoices\Actions\GenerateInvoicePdfAction;
use App\Filament\Resources\Invoices\Actions\SendInvoiceNotificationAction;
use App\Filament\Resources\Invoices\Actions\ShareInvoiceAction;
use App\Filament\Resources\Invoices\InvoiceResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditInvoice extends EditRecord
{
    protected static string $resource = InvoiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ShareInvoiceAction::make(),
            SendInvoiceNotificationAction::make(),
            AddInvoicePaymentAction::make(),
            GenerateInvoicePdfAction::make(),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
