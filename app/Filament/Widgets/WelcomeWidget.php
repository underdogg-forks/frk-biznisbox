<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class WelcomeWidget extends Widget
{
    protected static string $view = 'filament.widgets.welcome-widget';

    protected int | string | array $columnSpan = 'full';

    public function getHeading(): string
    {
        return 'Welcome to BiznisBox';
    }

    public function getData(): array
    {
        // TODO: Implement actual welcome data
        return [
            'user_name' => auth()->user()->first_name ?? 'User',
            'company_name' => 'BiznisBox',
        ];
    }
}
