<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class ClockWidget extends Widget
{
    protected static string $view = 'filament.widgets.clock-widget';

    protected int | string | array $columnSpan = 1;

    public function getHeading(): string
    {
        return 'Current Time';
    }

    public function getData(): array
    {
        return [
            'time' => now()->format('H:i:s'),
            'date' => now()->format('F d, Y'),
            'timezone' => config('app.timezone'),
        ];
    }
}
