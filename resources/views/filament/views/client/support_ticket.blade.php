{{-- Converted Blade template for Laravel Filament --}}
{{-- This template requires Filament components and controller data --}}
{{-- Vue components are marked with TODO comments for conversion --}}

<div id="client_view_support_ticket" class="p-2">
        {{-- TODO: Start LoadingScreen Filament equivalent --}}
            <div id="company_data" class="mb-2 d-block p-3">
                <span class="font-bold">{{ formatText($settings.company_name) }}</span
                ><br />
                <span>{{ formatText($settings.company_address) }}</span> <br />
                <span>{{ formatText($settings.company_zip) + ' ' + formatText($settings.company_city) }}</span> <br />
                <span>{{ formatCountry($settings.company_country) }}</span> <br />
                <span>{{ __("form.tax_id") + ': ' + $settings.company_vat }}</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-12 gap-2">
                <!-- Metadata view -->
                <div class="col-span-1 md:col-span-5">
                    <div class="card">
                        {{-- TODO: Convert DisplayData to Filament equivalent --}}
                        {{-- TODO: Convert DisplayData to Filament equivalent --}}

                        <div id="custom_contact">
                            {{-- TODO: Convert DisplayData to Filament equivalent --}}
                            {{-- TODO: Convert DisplayData to Filament equivalent --}}
                            {{-- TODO: Convert DisplayData to Filament equivalent --}}
                        </div>

                        {{-- TODO: Convert DisplayData to Filament equivalent --}}

                        {{-- TODO: Convert DisplayData to Filament equivalent --}}

                        {{-- TODO: Start DisplayData Filament equivalent --}}
                            {{-- TODO: Convert Tag to Filament equivalent --}}
                            {{-- TODO: Convert Tag to Filament equivalent --}}
                            {{-- TODO: Convert Tag to Filament equivalent --}}
                            {{-- TODO: Convert Tag to Filament equivalent --}}
                            {{-- TODO: Convert Tag to Filament equivalent --}}
                        {{-- TODO: End DisplayData --}}
                        {{-- TODO: Start DisplayData Filament equivalent --}}
                            {{-- TODO: Convert Tag to Filament equivalent --}}
                            {{-- TODO: Convert Tag to Filament equivalent --}}
                            {{-- TODO: Convert Tag to Filament equivalent --}}
                            {{-- TODO: Convert Tag to Filament equivalent --}}
                            {{-- TODO: Convert Tag to Filament equivalent --}}
                            {{-- TODO: Convert Tag to Filament equivalent --}}
                        {{-- TODO: End DisplayData --}}
                    </div>
                </div>
                <!-- Content view -->
                <div class="col-span-1 md:col-span-7">
                    <div class="card">
                        <h1 class="text-2xl font-bold mb-4">{{ __("form.message") }}</h1>
                        <div>
                            <div id="content_{{ index }}" class="card p-4 mb-4">
                                <div id="content_{{ index }}_from" class="mt-4">
                                    <div>
                                        <b>{{ __("form.from") }}: </b>
                                        {{-- TODO: Convert Tag to Filament equivalent --}}
                                    </div>
                                    <div>
                                        <b>{{ __("form.from") }}: </b>
                                        {{-- TODO: Convert Tag to Filament equivalent --}}
                                    </div>
                                </div>

                                <div id="content_{{ index }}_message" class="mt-4">
                                    <span></span>
                                </div>

                                <!-- Footer - date -->
                                {{-- TODO: Convert Tag to Filament equivalent --}}
                            </div>
                        </div>

                        <div>
                            <div
                            >
                                {{-- TODO: Convert TinyMceEditor to Filament equivalent --}}
                                {{-- TODO: Convert Button to Filament equivalent --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <p class="text-center text-xl font-bold">
                    {{ __("errors.not_found") }}
                </p>
            </div>
        {{-- TODO: End LoadingScreen --}}
    </div>