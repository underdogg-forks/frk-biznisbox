<?php

namespace App\Services\Concerns;

use Barryvdh\DomPDF\Facade\Pdf;

trait GeneratesPdf
{
    /**
     * Get company settings for PDF generation.
     */
    protected function getCompanySettings(): array
    {
        return settings([
            'company_name',
            'company_address',
            'company_city',
            'company_zip',
            'company_country',
            'company_phone',
            'company_email',
            'company_vat',
            'company_logo',
            'show_barcode_on_documents',
            'default_currency',
        ]);
    }

    /**
     * Generate PDF for a document.
     *
     * @param object $document Document model instance
     * @param string $view     Blade view name for PDF
     * @param string $type     Type of output (stream, download, attach)
     * @param string $filename Base filename for the document
     * @param string $activity Activity log action name
     * @param string $model    Model class name for activity log
     *
     * @return mixed PDF output based on type
     */
    protected function generatePdf(
        object $document,
        string $view,
        string $type = 'stream',
        string $filename = 'Document',
        string $activity = 'ViewDocument',
        string $model = 'App\Models\Document'
    ) {
        $settings = $this->getCompanySettings();
        $pdf      = PDF::loadView($view, compact('document', 'settings'));

        if ($type === 'attach') {
            return $pdf->output();
        }

        if ($type === 'download') {
            createActivityLog($activity, $document->id, $model, class_basename($model));

            return $pdf->download($filename . ' ' . $document->number . '.pdf');
        }

        createActivityLog($activity, $document->id, $model, class_basename($model));

        return $pdf->stream($filename . ' ' . $document->number . '.pdf');
    }
}
