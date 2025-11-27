<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Invoice;

class NumberOfUnpaidInvoicesWidget extends BaseWidget
{
    protected function getStats(): array
    {
        // TODO: Implement actual unpaid invoice count from dashboard data
        $unpaidCount = Invoice::where('status', 'unpaid')->count();
        $unpaidAmount = Invoice::where('status', 'unpaid')->sum('total');

        return [
            Stat::make('Unpaid Invoices', $unpaidCount)
                ->description('Total: $' . number_format($unpaidAmount, 2))
                ->descriptionIcon('heroicon-o-document-text')
                ->color('danger'),
        ];
    }
}
