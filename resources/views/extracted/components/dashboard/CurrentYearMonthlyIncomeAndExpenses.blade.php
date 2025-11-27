{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<div class="card">
        <span class="font-bold">{{ $t('dashboard.current_year_monthly_income_and_expenses') }}</span>
        <apexchart type="line" height="250" :options="options" :series="series"></apexchart>
    </div>