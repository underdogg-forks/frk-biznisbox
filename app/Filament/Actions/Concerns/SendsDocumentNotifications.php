<?php

namespace App\Filament\Actions\Concerns;

use App\Models\PartnerContact;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;

trait SendsDocumentNotifications
{
    /**
     * Create a notification sending action for a document.
     *
     * @param string $serviceClass Service class name
     * @param string $method       Method name on service
     * @param string $documentType Document type name (quote, invoice, etc.)
     * @param string $label        Action label
     *
     * @return Action
     */
    protected static function makeNotificationAction(
        string $serviceClass,
        string $method,
        string $documentType,
        string $label = 'Send Notification'
    ): Action {
        $documentTypeCapitalized = ucfirst($documentType);

        return Action::make('sendNotification')
            ->label($label)
            ->icon('heroicon-o-envelope')
            ->form([
                Select::make('contact_id')
                    ->label('Recipient Contact')
                    ->options(function ($record) {
                        if (! isset($record->customer_id)) {
                            return [];
                        }
                        return PartnerContact::where(function ($query) use ($record) {
                            $query->where('partner_id', $record->customer_id);
                            if (isset($record->payer_id)) {
                                $query->orWhere('partner_id', $record->payer_id);
                            }
                        })
                            ->whereNotNull('email')
                            ->pluck('email', 'id');
                    })
                    ->searchable()
                    ->helperText('Leave empty to send to all primary contacts'),
            ])
            ->action(function ($record, array $data) use ($serviceClass, $method, $documentType, $documentTypeCapitalized) {
                $service = app($serviceClass);
                $contact = isset($data['contact_id']) ? PartnerContact::find($data['contact_id']) : null;

                $result = $service->$method($record->id, $contact);

                if (! $result) {
                    static::notifyError(
                        'Error',
                        "{$documentTypeCapitalized} notification could not be sent"
                    );

                    return;
                }

                static::notifySuccess(
                    "{$documentTypeCapitalized} Notification Sent",
                    'Notification sent successfully'
                );
            });
    }
}
