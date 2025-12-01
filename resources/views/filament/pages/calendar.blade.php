<x-filament-panels::page>
{{--
    Converted from Vue: Calendar.vue
    
    CONVERSION NOTES:
    - All Vue directives (v-if, v-for, @click, :prop, etc.) have been removed
    - Vue components have been commented out - replace with Filament/Blade equivalents
    - {{ }} expressions are preserved but may reference Vue data - update as needed
    - Translation calls $t() have been converted to __()
    - This file requires significant manual work to become functional
--}}


    {{-- DefaultLayout removed: Using Filament page structure --}}
        {{-- PageHeader removed: Use Filament page header configuration --}}
        <div id="calendar" class="card">
            <FullCalendar ref="calendar" />
        </div>

        <!-- Dialog event -->
        {{-- Start Dialog --}}
            {{-- LoadingScreen removed --}}
                <Tabs value="event_details">
                    <TabList>
                        <Tab value="event_details">{{ __('calendar.event_details') }}</Tab>
                        <Tab value="attendees">{{ __('calendar.attendees') }}</Tab>
                    </TabList>

                    <TabPanels>
                        <!-- Event details -->
                        {{-- Start TabPanel --}}
                            <form>
                                <div class="grid grid-cols-1 lg:grid-cols-12 gap-2">
                                    {{-- TextInput (self-closing) --}}
                                    <div class="lg:col-span-2">
                                        <div class="flex flex-col gap-2 mb-2">
                                            <label for="color_input" class="dark:text-surface-200">{{ __('form.color') }}</label>
                                            {{-- ColorPicker (self-closing) --}}
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 lg:grid-cols-12 gap-2">
                                    {{-- Start DateInput --}}{{-- End DateInput --}}
                                    {{-- DateInput (self-closing) --}}
                                    <div class="flex items-center gap-2 lg:col-span-1">
                                        <Checkbox id="all_day_input" name="all_day" binary />
                                        <label class="dark:text-surface-200" for="all_day_input">{{ __('form.all_day') }}</label>
                                    </div>
                                </div>

                                <div class="grid">
                                    {{-- TextInput (self-closing) --}}
                                </div>

                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
                                    {{-- SelectInput (self-closing) --}}
                                    {{-- SelectInput (self-closing) --}}
                                </div>

                                {{-- TinyMceEditor (self-closing) --}}
                            </form>
                        {{-- End TabPanel --}}

                        <!-- Attendees -->
                        {{-- Start TabPanel --}}
                            <div class="my-2">
                                {{-- Button (self-closing) --}}
                            </div>

                            {{-- Start DataTable --}}
                                {{-- Vue slot removed --}}
                                    <div class="flex items-center justify-center p-3">
                                        <span class="dark:text-surface-200">{{ __('calendar.no_attendees') }}</span>
                                    </div>
                                {{-- End Vue slot --}}

                                {{-- Start Column --}}
                                    {{-- Vue slot removed --}}
                                        {{-- TextInput (self-closing) --}}
                                    {{-- End Vue slot --}}
                                {{-- End Column --}}

                                {{-- Start Column --}}
                                    {{-- Vue slot removed --}}
                                        {{-- TextInput (self-closing) --}}
                                    {{-- End Vue slot --}}
                                {{-- End Column --}}

                                {{-- Start Column --}}
                                    {{-- Vue slot removed --}}
                                        {{-- SelectInput (self-closing) --}}
                                    {{-- End Vue slot --}}
                                {{-- End Column --}}

                                {{-- Start Column --}}
                                    {{-- Vue slot removed --}}
                                        {{-- SelectInput (self-closing) --}}
                                    {{-- End Vue slot --}}
                                {{-- End Column --}}

                                {{-- Start Column --}}
                                    {{-- Vue slot removed --}}
                                        {{-- Button (self-closing) --}}
                                    {{-- End Vue slot --}}
                                {{-- End Column --}}
                            {{-- End DataTable --}}
                        {{-- End TabPanel --}}
                    </TabPanels>
                </Tabs>
            

            {{-- Vue slot removed --}}
                <div id="function_buttons" class="flex justify-end gap-2">
                    {{-- Button (self-closing) --}}
                    {{-- Button (self-closing) --}}
                    {{-- Button (self-closing) --}}
                </div>
            {{-- End Vue slot --}}
        {{-- End Dialog --}}
    

</x-filament-panels::page>
