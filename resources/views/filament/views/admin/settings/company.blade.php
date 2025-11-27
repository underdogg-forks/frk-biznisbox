{{-- Converted Blade template for Laravel Filament --}}
{{-- This template requires Filament components and controller data --}}
{{-- Vue components are marked with TODO comments for conversion --}}

{{-- TODO: Start DefaultLayout Filament equivalent --}}
        {{-- TODO: Start LoadingScreen Filament equivalent --}}
            {{-- TODO: Convert PageHeader to Filament equivalent --}}

            <div id="company_data" class="card">
                <form class="formgrid">
                    <div id="company_logo" class="flex items-center">
                        <Avatar
                            size="xlarge"
                            @contextmenu.prevent="removeLogo"
                            class="company-logo transition duration-300 ease-in-out transform hover:scale-110"
                        />
                        {{-- TODO: Start FileUpload Filament equivalent --}}
                    </div>

                    {{-- TODO: Convert TextInput to Filament equivalent --}}
                    {{-- TODO: Convert TextInput to Filament equivalent --}}
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-2">
                        {{-- TODO: Convert TextInput to Filament equivalent --}}
                        {{-- TODO: Convert TextInput to Filament equivalent --}}
                    </div>

                    {{-- TODO: Convert CountrySelect to Filament equivalent --}}

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                        {{-- TODO: Convert TextInput to Filament equivalent --}}
                        {{-- TODO: Convert TextInput to Filament equivalent --}}
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                        {{-- TODO: Convert TextInput to Filament equivalent --}}

                        {{-- TODO: Convert TextInput to Filament equivalent --}}
                    </div>

                    <div class="flex flex-col gap-2 mb-2">
                        <label for="color_input" class="dark:text-surface-200">{{ __("admin.company.company_primary_color") }}</label>
                        <div class="grid grid-cols-12 gap-2 items-center">
                            <ColorPicker id="color_input" class="col-span-1" />
                            {{-- TODO: Convert TextInput to Filament equivalent --}}
                        </div>
                    </div>
                </form>
            </div>
            <div id="function_buttons" class="flex justify-end mt-4 gap-2">
                {{-- TODO: Convert Button to Filament equivalent --}}
            </div>
        {{-- TODO: End LoadingScreen --}}
    {{-- TODO: End DefaultLayout --}}