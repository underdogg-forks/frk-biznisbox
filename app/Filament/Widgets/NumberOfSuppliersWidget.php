<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Partner;

class NumberOfSuppliersWidget extends BaseWidget
{
    protected function getStats(): array
    {
        // TODO: Implement actual supplier count from dashboard data
        $supplierCount = Partner::where('type', 'supplier')->count();

        return [
            Stat::make('Total Suppliers', $supplierCount)
                ->description('Active supplier accounts')
                ->descriptionIcon('heroicon-o-building-storefront')
                ->color('info'),
        ];
    }
}
