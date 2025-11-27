{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<div class="card">
        <span class="font-bold">{{ $t('admin.dashboard.chart_of_logins_this_month') }}</span>
        <apexchart type="line" height="250" :options="options" :series="series"></apexchart>
    </div>