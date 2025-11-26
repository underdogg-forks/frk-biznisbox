<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Employee;

class NumberOfEmployeesWidget extends BaseWidget
{
    protected function getStats(): array
    {
        // TODO: Implement actual employee count from dashboard data
        $employeeCount = Employee::count();

        return [
            Stat::make('Total Employees', $employeeCount)
                ->description('Active employees')
                ->descriptionIcon('heroicon-o-user-group')
                ->color('warning'),
        ];
    }
}
