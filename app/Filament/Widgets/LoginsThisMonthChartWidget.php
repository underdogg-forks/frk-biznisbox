<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class LoginsThisMonthChartWidget extends ChartWidget
{
    protected static ?string $heading = 'Logins This Month';

    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        // TODO: Implement actual login data from admin dashboard
        // This is placeholder data showing daily logins for current month
        $days = range(1, date('t')); // Days in current month
        $loginCounts = array_map(function() {
            return rand(5, 50); // Placeholder random data
        }, $days);
        
        return [
            'datasets' => [
                [
                    'label' => 'Daily Logins',
                    'data' => $loginCounts,
                    'borderColor' => '#3b82f6',
                    'backgroundColor' => 'rgba(59, 130, 246, 0.1)',
                ],
            ],
            'labels' => $days,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
