<?php

namespace App\Filament\Actions\Concerns;

use Filament\Actions\Action;

trait GeneratesDocumentPdf
{
    /**
     * Create a PDF generation action for a document.
     *
     * @param string $serviceClass Service class name
     * @param string $method       Method name on service to get PDF
     * @param string $label        Action label
     * @param string $documentType Document type name (invoice, quote, bill, etc.)
     *
     * @return Action
     */
    protected static function makePdfAction(
        string $serviceClass,
        string $method,
        string $label,
        string $documentType
    ): Action {
        return Action::make('generatePdf')
            ->label($label)
            ->icon('heroicon-o-document-arrow-down')
            ->action(function ($record) use ($serviceClass, $method, $documentType) {
                $service = app($serviceClass);

                try {
                    return response()->streamDownload(
                        fn () => echo $service->$method($record->id, 'attach'),
                        ucfirst($documentType) . ' ' . $record->number . '.pdf'
                    );
                } catch (\Exception $e) {
                    static::notifyError(
                        'Error',
                        'PDF could not be generated: ' . $e->getMessage()
                    );
                }
            });
    }
}
