{{-- Converted Blade template for Laravel Filament --}}
{{-- This template requires Filament components and controller data --}}
{{-- Vue components are marked with TODO comments for conversion --}}

{{-- TODO: Start DefaultLayout Filament equivalent --}}
        {{-- TODO: Start LoadingScreen Filament equivalent --}}
            {{-- TODO: Convert PageHeader to Filament equivalent --}}

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-3">
                <div class="grid grid-cols-1 lg:col-span-4">
                    <div class="card">
                        <div class="font-bold mb-4">
                            <h3>{{ __("partner.partner_details") }}</h3>
                        </div>
                        {{-- TODO: Convert DisplayData to Filament equivalent --}}
                        {{-- TODO: Convert DisplayData to Filament equivalent --}}
                        <div class="grid md:grid-cols-2 gap-2">
                            <div>
                                {{-- TODO: Convert Tag to Filament equivalent --}}
                                {{-- TODO: Convert Tag to Filament equivalent --}}
                                {{-- TODO: Convert Tag to Filament equivalent --}}
                                {{-- TODO: Convert Tag to Filament equivalent --}}
                            </div>
                            <div>
                                {{-- TODO: Convert Tag to Filament equivalent --}}
                                {{-- TODO: Convert Tag to Filament equivalent --}}
                            </div>
                        </div>
                        {{-- TODO: Convert DisplayData to Filament equivalent --}}
                        {{-- TODO: Convert DisplayData to Filament equivalent --}}
                        {{-- TODO: Convert DisplayData to Filament equivalent --}}
                        {{-- TODO: Convert DisplayData to Filament equivalent --}}
                        {{-- TODO: Convert DisplayData to Filament equivalent --}}
                        {{-- TODO: Convert DisplayData to Filament equivalent --}}
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:col-span-8">
                    <div class="card">
                        <Tabs value="contact_information" scrollable>
                            <TabList>
                                <Tab value="contact_information">{{ __("partner.contact_information") }}</Tab>
                                <Tab value="addresses">{{ __("partner.addresses") }}</Tab>
                            </TabList>

                            <TabPanels>
                                <!-- Contacts table -->
                                {{-- TODO: Start TabPanel Filament equivalent --}}
                                    {{-- TODO: Start DataTable Filament equivalent --}}
                                        <template #empty>
                                            <div class="p-4 pl-0 text-center w-full dark:text-gray-400">
                                                <i class="fa fa-info-circle empty-icon"></i>
                                                <p>{{ __("partner.no_contacts") }}</p>
                                            </div>