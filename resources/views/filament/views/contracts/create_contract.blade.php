{{-- Converted Blade template for Laravel Filament --}}
{{-- This template requires Filament components and controller data --}}
{{-- Vue components are marked with TODO comments for conversion --}}

{{-- TODO: Start DefaultLayout Filament equivalent --}}
        {{-- TODO: Start LoadingScreen Filament equivalent --}}
            {{-- TODO: Convert PageHeader to Filament equivalent --}}

            <div class="card">
                <form>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        {{-- TODO: Convert TextInput to Filament equivalent --}}
                        {{-- TODO: Convert SelectInput to Filament equivalent --}}
                    </div>

                    <div>
                        {{-- TODO: Convert TextInput to Filament equivalent --}}
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        {{-- TODO: Convert SelectInput to Filament equivalent --}}
                        {{-- TODO: Convert SelectInput to Filament equivalent --}}

                        {{-- TODO: Convert SelectInput to Filament equivalent --}}
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        {{-- TODO: Convert DateInput to Filament equivalent --}}
                        {{-- TODO: Convert DateInput to Filament equivalent --}}
                        {{-- TODO: Convert DateInput to Filament equivalent --}}
                    </div>

                    <div id="signers_table" class="overflow-x-auto">
                        <div class="py-2">
                            {{-- TODO: Convert Button to Filament equivalent --}}
                        </div>
                        {{-- TODO: Start DataTable Filament equivalent --}}
                            <template #empty>
                                <div class="p-4 pl-0 text-center">{{ __("contract.no_signers") }}</div>