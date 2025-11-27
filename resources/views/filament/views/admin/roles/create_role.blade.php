{{-- Converted Blade template for Laravel Filament --}}
{{-- This template requires Filament components and controller data --}}
{{-- Vue components are marked with TODO comments for conversion --}}

{{-- TODO: Start DefaultLayout Filament equivalent --}}
        {{-- TODO: Start LoadingScreen Filament equivalent --}}
            {{-- TODO: Convert PageHeader to Filament equivalent --}}

            <div class="card">
                <form class="formgrid">
                    {{-- TODO: Convert TextInput to Filament equivalent --}}
                    {{-- TODO: Convert TextAreaInput to Filament equivalent --}}
                    <div id="permissions" class="my-2">
                        <h3>{{ __("form.permissions") }}</h3>
                        <div class="flex flex-wrap gap-2">
                            <div class="flex items-center gap-2">
                                {{-- TODO: Convert Checkbox to Filament equivalent --}}
                                <label>{{ permission.display_name }}</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div id="function_buttons" class="flex justify-end mt-4 gap-2">
                {{-- TODO: Start Button Filament equivalent --}}
                {{-- TODO: Convert Button to Filament equivalent --}}
            </div>
        {{-- TODO: End LoadingScreen --}}
    {{-- TODO: End DefaultLayout --}}