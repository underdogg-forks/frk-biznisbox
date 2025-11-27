<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CurrentYearIncomeExpenseWidget extends BaseWidget
{
    protected function getStats(): array
    {
        // TODO: Implement actual current year income/expense from dashboard data
        $currentYear = date('Y');
        
        // Placeholder calculations
        $totalIncome = 240000;
        $totalExpense = 150000;
        $profit = $totalIncome - $totalExpense;
        $profitMargin = ($profit / $totalIncome) * 100;

        return [
            Stat::make("$currentYear Income", '$' . number_format($totalIncome, 2))
                ->description('Total revenue')
                ->descriptionIcon('heroicon-o-arrow-trending-up')
                ->color('success'),
            
            Stat::make("$currentYear Expenses", '$' . number_format($totalExpense, 2))
                ->description('Total costs')
                ->descriptionIcon('heroicon-o-arrow-trending-down')
                ->color('danger'),
            
            Stat::make('Profit', '$' . number_format($profit, 2))
                ->description(number_format($profitMargin, 1) . '% margin')
                ->descriptionIcon('heroicon-o-chart-bar')
                ->color('success'),
        ];
    }
}
