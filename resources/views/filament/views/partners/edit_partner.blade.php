{{-- Converted Blade template for Laravel Filament --}}
{{-- This template requires Filament components and controller data --}}
{{-- Vue components are marked with TODO comments for conversion --}}

{{-- TODO: Start DefaultLayout Filament equivalent --}}
        {{-- TODO: Start LoadingScreen Filament equivalent --}}
            {{-- TODO: Convert PageHeader to Filament equivalent --}}
            <div class="card">
                <form>
                    <div class="grid lg:grid-cols-2 grid-cols-1 gap-2">
                        {{-- TODO: Convert TextInput to Filament equivalent --}}
                        {{-- TODO: Convert TextInput to Filament equivalent --}}
                    </div>

                    <div class="grid lg:grid-cols-2 grid-cols-1 gap-2">
                        {{-- TODO: Convert SelectButtonInput to Filament equivalent --}}

                        {{-- TODO: Convert SelectButtonInput to Filament equivalent --}}
                    </div>

                    <div class="grid lg:grid-cols-2 grid-cols-1 gap-2">
                        {{-- TODO: Convert SelectInput to Filament equivalent --}}
                        {{-- TODO: Convert SelectInput to Filament equivalent --}}
                    </div>
                    <div class="grid lg:grid-cols-2 grid-cols-1 gap-2">
                        {{-- TODO: Convert TextInput to Filament equivalent --}}

                        {{-- TODO: Convert SelectInput to Filament equivalent --}}
                    </div>
                    <div class="grid lg:grid-cols-2 grid-cols-1 gap-2">
                        <div class="grid grid-cols-1 gap-2">
                            <div class="flex items-end gap-2 content-center">
                                {{-- TODO: Convert TextInput to Filament equivalent --}}
                                {{-- TODO: Convert Button to Filament equivalent --}}
                            </div>
                            <div class="text-red-500 text-sm">
                                {{ vatValidationError }}
                            </div>
                        </div>

                        <!-- Industry select -->
                        {{-- TODO: Convert SelectInput to Filament equivalent --}}
                    </div>
                    <div id="addresses_table_section" class="grid">
                        <div class="my-2">
                            {{-- TODO: Convert Button to Filament equivalent --}}
                        </div>
                        {{-- TODO: Start DataTable Filament equivalent --}}
                            {{-- TODO: Convert slot to Blade section --}}
                                <div class="p-4 pl-0 text-center">{{ __("partner.no_addresses") }}</div>