{{-- Converted Blade template for Laravel Filament --}}
{{-- This template requires Filament components and controller data --}}
{{-- Vue components are marked with TODO comments for conversion --}}

<div id="client_view_contract_page" class="p-2">
        {{-- TODO: Start LoadingScreen Filament equivalent --}}
            <div>
                <div id="company_data" class="p-3">
                    <span class="font-bold">{{ formatText($settings.company_name) }}</span
                    ><br />
                    <span>{{ formatText($settings.company_address) }}</span> <br />
                    <span>{{ formatText($settings.company_zip) + ' ' + formatText($settings.company_city) }}</span> <br />
                    <span>{{ formatCountry($settings.company_country) }}</span> <br />
                    <span>{{ __("form.tax_id") + ': ' + $settings.company_vat }}</span>
                </div>

                <div class="card m-2">
                    {{-- TODO: Start PageHeader Filament equivalent --}}
                        {{-- TODO: Convert slot to Blade section --}}
                            {{-- TODO: Convert Button to Filament equivalent --}}
                            {{-- TODO: Convert Button to Filament equivalent --}}