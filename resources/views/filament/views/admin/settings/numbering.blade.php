{{-- Converted Blade template for Laravel Filament --}}
{{-- This template requires Filament components and controller data --}}
{{-- Vue components are marked with TODO comments for conversion --}}

{{-- TODO: Start DefaultLayout Filament equivalent --}}
        {{-- TODO: Start LoadingScreen Filament equivalent --}}
            <user-headeradmin.numbering.title")" />

            <div class="card">
                <Tabs value="invoice">
                    <TabList>
                        <Tab value="invoice">{{ __("admin.numbering.invoice") }}</Tab>
                        <Tab value="quote">{{ __("admin.numbering.quote") }}</Tab>
                        <Tab value="transaction">{{ __("admin.numbering.transaction") }}</Tab>
                        <Tab value="payment">{{ __("admin.numbering.payment") }}</Tab>
                        <Tab value="partner">{{ __("admin.numbering.partner") }}</Tab>
                        <Tab value="bill">{{ __("admin.numbering.bill") }}</Tab>
                        <Tab value="document">{{ __("admin.numbering.document") }}</Tab>
                        <Tab value="product">{{ __("admin.numbering.product") }}</Tab>
                        <Tab value="employee">{{ __("admin.numbering.employee") }}</Tab>
                        <Tab value="archive">{{ __("admin.numbering.archive") }}</Tab>
                        <Tab value="project">{{ __("admin.numbering.project") }}</Tab>
                        <Tab value="contract">{{ __("admin.numbering.contract") }}</Tab>
                    </TabList>

                    <TabPanels>
                        <!-- Invoice -->
                        {{-- TODO: Start TabPanel Filament equivalent --}}
                            <NumberingInput @update:model-value="updateNumberingModel" />
                        {{-- TODO: End TabPanel --}}
                        <!-- Quote -->
                        {{-- TODO: Start TabPanel Filament equivalent --}}
                            <NumberingInput @update:model-value="updateNumberingModel" />
                        {{-- TODO: End TabPanel --}}
                        <!-- Transaction -->
                        {{-- TODO: Start TabPanel Filament equivalent --}}
                            <NumberingInput @update:model-value="updateNumberingModel" />
                        {{-- TODO: End TabPanel --}}
                        <!-- Payment -->
                        {{-- TODO: Start TabPanel Filament equivalent --}}
                            <NumberingInput @update:model-value="updateNumberingModel" />
                        {{-- TODO: End TabPanel --}}
                        <!-- Partner -->
                        {{-- TODO: Start TabPanel Filament equivalent --}}
                            <NumberingInput @update:model-value="updateNumberingModel" />
                        {{-- TODO: End TabPanel --}}
                        <!-- Bill -->
                        {{-- TODO: Start TabPanel Filament equivalent --}}
                            <NumberingInput @update:model-value="updateNumberingModel" />
                        {{-- TODO: End TabPanel --}}
                        <!-- Document -->
                        {{-- TODO: Start TabPanel Filament equivalent --}}
                            <NumberingInput @update:model-value="updateNumberingModel" />
                        {{-- TODO: End TabPanel --}}
                        <!-- Product -->
                        {{-- TODO: Start TabPanel Filament equivalent --}}
                            <NumberingInput @update:model-value="updateNumberingModel" />
                        {{-- TODO: End TabPanel --}}
                        <!-- Employee -->
                        {{-- TODO: Start TabPanel Filament equivalent --}}
                            <NumberingInput @update:model-value="updateNumberingModel" />
                        {{-- TODO: End TabPanel --}}
                        <!-- Archive -->
                        {{-- TODO: Start TabPanel Filament equivalent --}}
                            <NumberingInput @update:model-value="updateNumberingModel" />
                        {{-- TODO: End TabPanel --}}
                        <!-- Project -->
                        {{-- TODO: Start TabPanel Filament equivalent --}}
                            <NumberingInput @update:model-value="updateNumberingModel" />
                        {{-- TODO: End TabPanel --}}
                        <!-- Contract -->
                        {{-- TODO: Start TabPanel Filament equivalent --}}
                            <NumberingInput @update:model-value="updateNumberingModel" />
                        {{-- TODO: End TabPanel --}}
                    </TabPanels>
                </Tabs>
            </div>
            <div id="function_buttons" class="flex justify-end mt-4 gap-2">
                {{-- TODO: Convert Button to Filament equivalent --}}
            </div>
        {{-- TODO: End LoadingScreen --}}
    {{-- TODO: End DefaultLayout --}}