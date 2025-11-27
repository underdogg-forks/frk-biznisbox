<?php

namespace App\Services\Concerns;

use App\Models\PartnerContact;
use Illuminate\Support\Facades\Mail;

trait SendsNotifications
{
    /**
     * Send notification to contacts.
     *
     * @param object      $document     Document model instance
     * @param string      $documentType Document type (quote, invoice, contract)
     * @param string      $mailClass    Mail class to use
     * @param object|null $contact      Specific contact or null for all primary contacts
     *
     * @return bool
     */
    protected function sendDocumentNotification(
        object $document,
        string $documentType,
        string $mailClass,
        ?object $contact = null
    ): bool {
        if ($contact !== null) {
            return $this->sendToSingleContact($document, $documentType, $mailClass, $contact);
        }

        return $this->sendToPrimaryContacts($document, $documentType, $mailClass);
    }

    /**
     * Send notification to a single contact.
     */
    private function sendToSingleContact(
        object $document,
        string $documentType,
        string $mailClass,
        object $contact
    ): bool {
        $url = $this->generateDocumentUrl($document, $documentType, $contact->email);
        Mail::to($contact->email)->send(new $mailClass($document, $url, $contact));

        return true;
    }

    /**
     * Send notification to all primary contacts.
     */
    private function sendToPrimaryContacts(
        object $document,
        string $documentType,
        string $mailClass
    ): bool {
        $contacts = PartnerContact::where(function ($query) use ($document) {
            $query->where('partner_id', $document->customer_id)
                ->orWhere('partner_id', $document->payer_id ?? null);
        })
            ->where('is_primary', true)
            ->whereNotNull('email')
            ->get();

        foreach ($contacts as $contact) {
            $url = $this->generateDocumentUrl($document, $documentType, $contact->email);
            Mail::to($contact->email)->send(new $mailClass($document, $url, $contact));
        }

        return true;
    }

    /**
     * Generate document URL with authentication key.
     */
    private function generateDocumentUrl(
        object $document,
        string $documentType,
        string $email
    ): string {
        return url(
            "/client/{$documentType}/{$document->id}"
                . '?key=' . generateExternalKey($documentType, $document->id, 'system', null, $email, 'email')
                . '&lang=' . app()->getLocale()
        );
    }

    /**
     * Update document status after sending notification.
     */
    protected function updateStatusAfterNotification(object $document, array $excludeStatuses, string $newStatus = 'sent'): void
    {
        if (! in_array($document->status, $excludeStatuses)) {
            $document->status = $newStatus;
            $document->save();
        }
    }
}
