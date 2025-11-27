<?php

namespace App\Filament\Actions\Concerns;

use Filament\Actions\Action;

trait SharesDocuments
{
    use HandlesNotifications;

    /**
     * Create a share action for a document.
     *
     * @param string        $serviceClass Service class name
     * @param string        $method       Method name on service
     * @param string        $label        Action label
     * @param string        $route        Client route name
     * @param string        $documentType Document type name for messages
     * @param callable|null $getData      Optional callback to get additional data for share method
     *
     * @return Action
     */
    protected static function makeShareAction(
        string $serviceClass,
        string $method,
        string $label,
        string $route,
        string $documentType,
        ?callable $getData = null
    ): Action {
        return Action::make('share')
            ->label($label)
            ->icon('heroicon-o-share')
            ->action(function ($record) use ($serviceClass, $method, $route, $documentType, $getData) {
                $service = app($serviceClass);
                $data    = $getData ? $getData($record) : [];
                $result  = $service->$method($record->id, $data);

                if (! $result) {
                    static::notifyError('Error', ucfirst($documentType) . ' could not be shared');

                    return;
                }

                $shareUrl = route($route) . '?key=' . $result['share_key'];

                static::notifySuccess(
                    ucfirst($documentType) . ' Share Link Generated',
                    "Share this link: {$shareUrl}"
                );

                return $shareUrl;
            });
    }
}
