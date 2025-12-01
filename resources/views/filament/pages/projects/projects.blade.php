<x-filament-panels::page>
{{--
    Converted from Vue: Projects.vue
    
    CONVERSION NOTES:
    - All Vue directives (v-if, v-for, @click, :prop, etc.) have been removed
    - Vue components have been commented out - replace with Filament/Blade equivalents
    - {{ }} expressions are preserved but may reference Vue data - update as needed
    - Translation calls $t() have been converted to __()
    - This file requires significant manual work to become functional
--}}


    {{-- DefaultLayout removed: Using Filament page structure --}}
        {{-- PageHeader removed: Use Filament page header configuration --}}

        <div id="projects_table" class="card">
            {{-- Start DataTable --}}
                {{-- Vue slot removed --}}
                    <div class="p-4 pl-0 text-center w-full dark:text-gray-400">
                        <i class="fa fa-info-circle empty-icon"></i>
                        <p>{{ __('project.no_projects') }}</p>
                        {{-- Button (self-closing) --}}
                    </div>
                {{-- End Vue slot --}}

                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        <InputText placeholder="Search by number" />
                    {{-- End Vue slot --}}
                {{-- End Column --}}
                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        <InputText placeholder="Search by name" />
                    {{-- End Vue slot --}}
                {{-- End Column --}}
                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        <span>{{ data.start_date ? formatDate(data.start_date) : '' }}</span> <br />
                        <span>{{ data.end_date ? formatDate(data.end_date) : '' }}</span>
                    {{-- End Vue slot --}}
                    {{-- Vue slot removed --}}
                        <div class="flex">
                            <InputText placeholder="Search by date" />
                        </div>
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
                {{-- Vue slot removed --}}
                    {{-- Button (self-closing) --}}
                {{-- End Vue slot --}}
            {{-- End DataTable --}}
        </div>

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
    

</x-filament-panels::page>
