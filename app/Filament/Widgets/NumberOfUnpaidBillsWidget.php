<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Bill;

class NumberOfUnpaidBillsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        // TODO: Implement actual unpaid bill count from dashboard data
        $unpaidCount = Bill::where('status', 'unpaid')->count();
        $unpaidAmount = Bill::where('status', 'unpaid')->sum('total');

        return [
            Stat::make('Unpaid Bills', $unpaidCount)
                ->description('Total: $' . number_format($unpaidAmount, 2))
                ->descriptionIcon('heroicon-o-document')
                ->color('danger'),
        ];
    }
}
