<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;

class NumberOfUsersWidget extends BaseWidget
{
    protected function getStats(): array
    {
        // TODO: Implement actual user count from admin dashboard data
        $totalUsers = User::count();
        $activeUsers = User::where('active', true)->count();

        return [
            Stat::make('Total Users', $totalUsers)
                ->description("$activeUsers active")
                ->descriptionIcon('heroicon-o-users')
                ->color('primary'),
        ];
    }
}
