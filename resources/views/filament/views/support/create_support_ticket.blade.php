{{-- Converted Blade template for Laravel Filament --}}
{{-- This template requires Filament components and controller data --}}
{{-- Vue components are marked with TODO comments for conversion --}}

{{-- TODO: Start DefaultLayout Filament equivalent --}}
        {{-- TODO: Start LoadingScreen Filament equivalent --}}
            {{-- TODO: Convert PageHeader to Filament equivalent --}}

            <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                <!-- Metadata view -->
                <div class="col-span-1 md:col-span-4">
                    <div class="formgrid card">
                        {{-- TODO: Convert TextInput to Filament equivalent --}}
                        {{-- TODO: Convert TextInput to Filament equivalent --}}
                        {{-- TODO: Convert SelectInput to Filament equivalent --}}
                        {{-- TODO: Convert SelectInput to Filament equivalent --}}

                        <div class="flex flex-col gap-2 mb-2">
                            <label for="is_internal_switch" class="dark:text-surface-200">{{ __("form.is_internal") }}</label>
                            {{-- TODO: Convert component to Filament equivalent --}}
                        </div>

                        <div id="partner_input">
                            <div class="flex flex-col gap-2 mb-2">
                                <label for="custom_partner_switch" class="dark:text-surface-200">{{ __("form.custom_contact") }}</label>
                                {{-- TODO: Convert component to Filament equivalent --}}
                            </div>
                            {{-- TODO: Convert SelectInput to Filament equivalent --}}

                            {{-- TODO: Convert SelectInput to Filament equivalent --}}

                            <div>
                                {{-- TODO: Convert TextInput to Filament equivalent --}}
                                {{-- TODO: Convert TextInput to Filament equivalent --}}
                                {{-- TODO: Convert TextInput to Filament equivalent --}}
                            </div>
                        </div>

                        <div class="grid">
                            {{-- TODO: Convert SelectInput to Filament equivalent --}}
                            {{-- TODO: Convert SelectInput to Filament equivalent --}}
                        </div>
                        <div class="grid">
                            {{-- TODO: Convert TextAreaInput to Filament equivalent --}}
                        </div>
                    </div>
                </div>
                <!-- Content view -->
                <div class="cols-span-1 md:col-span-8">
                    <div class="card">
                        {{-- TODO: Convert TinyMceEditor to Filament equivalent --}}
                    </div>
                </div>
            </div>
            <div id="function_buttons" class="flex justify-end mt-4 gap-2">
                {{-- TODO: Start Button Filament equivalent --}}
                {{-- TODO: Convert Button to Filament equivalent --}}
            </div>
        {{-- TODO: End LoadingScreen --}}
    {{-- TODO: End DefaultLayout --}}