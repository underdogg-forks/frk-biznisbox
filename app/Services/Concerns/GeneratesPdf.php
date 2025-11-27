<?php

namespace App\Services\Concerns;

use App\Enums\PdfOutputType;
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
     * @param object           $document Document model instance
     * @param string           $view     Blade view name for PDF
     * @param string|PdfOutputType $type     Type of output (attach, download, stream)
     * @param string           $filename Base filename for the document
     * @param string           $activity Activity log action name
     * @param string           $model    Model class name for activity log
     *
     * @return mixed PDF output based on type
     * @throws \InvalidArgumentException
     */
    protected function generatePdf(
        object $document,
        string $view,
        string|PdfOutputType $type = 'stream',
        string $filename = 'Document',
        string $activity = 'ViewDocument',
        string $model = 'App\Models\Document'
    ) {
        // Normalize string to enum if needed
        if (is_string($type)) {
            $type = PdfOutputType::tryFrom($type);
            if ($type === null) {
                throw new \InvalidArgumentException("Invalid PDF type. Must be 'attach', 'download', or 'stream'.");
            }
        }

        $settings = $this->getCompanySettings();
        $pdf      = PDF::loadView($view, compact('document', 'settings'));

        if ($type === PdfOutputType::ATTACH) {
            return $pdf->output();
        }

        // Log activity for download and stream
        createActivityLog($activity, $document->id, $model, class_basename($model));

        if ($type === PdfOutputType::DOWNLOAD) {
            return $pdf->download($filename . ' ' . $document->number . '.pdf');
        }

        return $pdf->stream($filename . ' ' . $document->number . '.pdf');
    }
}
