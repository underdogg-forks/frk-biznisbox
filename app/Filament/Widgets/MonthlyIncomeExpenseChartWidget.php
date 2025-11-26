<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class MonthlyIncomeExpenseChartWidget extends ChartWidget
{
    protected static ?string $heading = 'Monthly Income vs Expenses';

    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        // TODO: Implement actual monthly income/expense data from dashboard
        // This is placeholder data
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        
        return [
            'datasets' => [
                [
                    'label' => 'Income',
                    'data' => [12000, 15000, 14000, 18000, 16000, 19000, 21000, 20000, 22000, 24000, 23000, 25000],
                    'borderColor' => '#10b981',
                    'backgroundColor' => 'rgba(16, 185, 129, 0.1)',
                ],
                [
                    'label' => 'Expenses',
                    'data' => [8000, 9000, 8500, 11000, 10000, 12000, 13000, 12500, 14000, 15000, 14500, 16000],
                    'borderColor' => '#ef4444',
                    'backgroundColor' => 'rgba(239, 68, 68, 0.1)',
                ],
            ],
            'labels' => $months,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
