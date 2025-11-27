<?php

namespace App\Filament\Actions\Concerns;

use Filament\Notifications\Notification;

trait HandlesNotifications
{
    /**
     * Send success notification.
     */
    protected static function notifySuccess(string $title, string $body): void
    {
        Notification::make()
            ->title($title)
            ->body($body)
            ->success()
            ->send();
    }

    /**
     * Send error notification.
     */
    protected static function notifyError(string $title, string $body): void
    {
        Notification::make()
            ->title($title)
            ->body($body)
            ->danger()
            ->send();
    }

    /**
     * Send warning notification.
     */
    protected static function notifyWarning(string $title, string $body): void
    {
        Notification::make()
            ->title($title)
            ->body($body)
            ->warning()
            ->send();
    }

    /**
     * Send info notification.
     */
    protected static function notifyInfo(string $title, string $body): void
    {
        Notification::make()
            ->title($title)
            ->body($body)
            ->info()
            ->send();
    }
}
