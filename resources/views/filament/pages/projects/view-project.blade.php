<x-filament-panels::page>
{{--
    Converted from Vue: ViewProject.vue
    
    CONVERSION NOTES:
    - All Vue directives (v-if, v-for, @click, :prop, etc.) have been removed
    - Vue components have been commented out - replace with Filament/Blade equivalents
    - {{ }} expressions are preserved but may reference Vue data - update as needed
    - Translation calls $t() have been converted to __()
    - This file requires significant manual work to become functional
--}}


    {{-- DefaultLayout removed: Using Filament page structure --}}
        {{-- PageHeader removed: Use Filament page header configuration --}}

        <Tabs>
            <TabList>
                <Tab value="tasks">{{ __('project.tasks') }} ({{ project.tasks ? project.tasks.length : 0 }})</Tab>
            </TabList>

            <TabPanels>
                {{-- Start TabPanel --}}
                    <div id="tasks_table" class="card">
                        {{-- Start DataTable --}}
                            {{-- Vue slot removed --}}
                                <div class="p-4 pl-0 text-center w-full dark:text-gray-400">
                                    <i class="fa fa-info-circle empty-icon"></i>
                                    <p>{{ __('project.no_tasks') }}</p>
                                    {{-- Button (self-closing) --}}
                                </div>
                            {{-- End Vue slot --}}

                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    {{ data.number }}
                                {{-- End Vue slot --}}
                            {{-- End Column --}}

                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    <InputText placeholder="Search by title" />
                                {{-- End Vue slot --}}
                            {{-- End Column --}}
                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    {{-- Tag (self-closing) --}}
                                {{-- End Vue slot --}}
                                {{-- Vue slot removed --}}
                                    <Select placeholder="Select a type" />
                                {{-- End Vue slot --}}
                            {{-- End Column --}}
                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    {{-- Tag (self-closing) --}}
                                {{-- End Vue slot --}}
                                {{-- Vue slot removed --}}
                                    <Select
                                        option-label="label"
                                        option-value="value"
                                        placeholder="Select a status"
                                    />
                                {{-- End Vue slot --}}
                            {{-- End Column --}}
                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    {{-- Tag (self-closing) --}}
                                {{-- End Vue slot --}}
                                {{-- Vue slot removed --}}
                                    <Select
                                        option-label="label"
                                        option-value="value"
                                        placeholder="Select a priority"
                                    />
                                {{-- End Vue slot --}}
                            {{-- End Column --}}
                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    <span>{{ data.due_date ? formatDate(data.due_date) : '' }}</span>
                                {{-- End Vue slot --}}
                                {{-- Vue slot removed --}}
                                    <div class="flex">
                                        <InputText placeholder="Search by due date" />
                                    </div>
                                {{-- End Vue slot --}}
                            {{-- End Column --}}
                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    {{-- ProgressBar (self-closing) --}}
                                {{-- End Vue slot --}}
                            {{-- End Column --}}
                        {{-- End DataTable --}}
                    </div>
                {{-- End TabPanel --}}
            </TabPanels>
        </Tabs>

        <!-- Edit Project Dialog -->
        {{-- Start Dialog --}}
            {{-- LoadingScreen removed --}}
                <form>
                    {{-- TextInput (self-closing) --}}
                    {{-- TextInput (self-closing) --}}
                    {{-- TinyMceEditor (self-closing) --}}

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                        {{-- DateInput (self-closing) --}}
                        {{-- DateInput (self-closing) --}}
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                        {{-- SelectInput (self-closing) --}}

                        {{-- SelectInput (self-closing) --}}
                    </div>

                    {{-- NumberInput (self-closing) --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                        <div class="flex flex-col gap-2 mb-2">
                            <label for="project_is_billable" class="dark:text-surface-200">{{ __('form.is_billable') }}</label>
                            <ToggleSwitch id="project_is_billable" />
                        </div>
                        <div class="flex flex-col gap-2 mb-2">
                            <label for="project_is_active" class="dark:text-surface-200">{{ __('form.active') }}</label>
                            <ToggleSwitch />
                        </div>
                    </div>
                    {{-- SelectInput (self-closing) --}}
                </form>
            

            {{-- Vue slot removed --}}
                <div id="function_buttons" class="flex gap-2 flex-wrap">
                    <div class="flex-grow"></div>
                    <div class="flex justify-content-end gap-2 flex-wrap">
                        {{-- Button (self-closing) --}}
                        {{-- Button (self-closing) --}}
                    </div>
                </div>
            {{-- End Vue slot --}}
        {{-- End Dialog --}}

        <!-- New edit task Dialog -->
        {{-- Start Dialog --}}
            {{-- LoadingScreen removed --}}
                <form>
                    {{-- TextInput (self-closing) --}}
                    {{-- SelectInput (self-closing) --}}
                    {{-- SelectInput (self-closing) --}}
                    {{-- TinyMceEditor (self-closing) --}}
                    {{-- TextAreaInput (self-closing) --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                        {{-- DateInput (self-closing) --}}
                        {{-- DateInput (self-closing) --}}
                    </div>
                    {{-- DateInput (self-closing) --}}
                    {{-- NumberInput (self-closing) --}}

                    {{-- SelectInput (self-closing) --}}

                    {{-- SelectInput (self-closing) --}}

                    {{-- SelectInput (self-closing) --}}

                    <div class="flex flex-col gap-2 mb-2">
                        <label for="task_is_active" class="dark:text-surface-200">{{ __('form.active') }}</label>
                        <ToggleSwitch id="task_is_active" />
                    </div>
                </form>
            
            {{-- Vue slot removed --}}
                <div id="function_buttons" class="flex gap-2 flex-wrap">
                    {{-- Button (self-closing) --}}
                    <div class="flex-grow"></div>
                    <div class="flex justify-content-end gap-2 flex-wrap">
                        {{-- Button (self-closing) --}}
                        {{-- Button (self-closing) --}}
                    </div>
                </div>
            {{-- End Vue slot --}}
        {{-- End Dialog --}}

        <!-- Members Dialog -->
        {{-- Start Dialog --}}
            {{-- LoadingScreen removed --}}
                <form>
                    {{-- Start DataTable --}}
                        {{-- Start Column --}}
                            {{-- Vue slot removed --}}
                                <div class="flex align-items-center justify-content-start gap-2">
                                    {{-- Avatar (self-closing) --}}
                                    <span>{{ data.full_name }}</span>
                                </div>
                            {{-- End Vue slot --}}
                        {{-- End Column --}}
                        {{-- Start Column --}}{{-- End Column --}}
                        {{-- Start Column --}}
                            {{-- Vue slot removed --}}
                                {{-- Tag (self-closing) --}}
                            {{-- End Vue slot --}}
                        {{-- End Column --}}
                        {{-- Start Column --}}
                            {{-- Vue slot removed --}}
                                {{-- Button (self-closing) --}}
                                {{-- Button (self-closing) --}}
                            {{-- End Vue slot --}}
                        {{-- End Column --}}
                    {{-- End DataTable --}}
                </form>
            
            {{-- Vue slot removed --}}
                <div id="function_buttons" class="flex gap-2 flex-wrap">
                    <div class="flex-grow"></div>
                    <div class="flex justify-content-end gap-2 flex-wrap">
                        {{-- Button (self-closing) --}}
                        {{-- Button (self-closing) --}}
                    </div>
                </div>
            {{-- End Vue slot --}}
        {{-- End Dialog --}}

        <!-- New/Edit Project Member Dialog -->
        {{-- Start Dialog --}}
            {{-- LoadingScreen removed --}}
                <form>
                    {{-- SelectInput (self-closing) --}}
                    {{-- SelectInput (self-closing) --}}
                </form>
            
            {{-- Vue slot removed --}}
                <div id="function_buttons" class="flex gap-2 flex-wrap">
                    <div class="flex-grow"></div>
                    <div class="flex justify-content-end gap-2 flex-wrap">
                        {{-- Button (self-closing) --}}
                        {{-- Button (self-closing) --}}
                    </div>
                </div>
            {{-- End Vue slot --}}
        {{-- End Dialog --}}
    

</x-filament-panels::page>
