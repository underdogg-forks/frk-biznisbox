<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Partner;

class NumberOfCustomersWidget extends BaseWidget
{
    protected function getStats(): array
    {
        // TODO: Implement actual customer count from dashboard data
        $customerCount = Partner::where('type', 'customer')->count();

        return [
            Stat::make('Total Customers', $customerCount)
                ->description('Active customer accounts')
                ->descriptionIcon('heroicon-o-users')
                ->color('success'),
        ];
    }
}
