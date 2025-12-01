<x-filament-panels::page>
{{--
    Converted from Vue: Users.vue
    
    CONVERSION NOTES:
    - All Vue directives (v-if, v-for, @click, :prop, etc.) have been removed
    - Vue components have been commented out - replace with Filament/Blade equivalents
    - {{ }} expressions are preserved but may reference Vue data - update as needed
    - Translation calls $t() have been converted to __()
    - This file requires significant manual work to become functional
--}}


    {{-- DefaultLayout removed: Using Filament page structure --}}
        {{-- PageHeader removed: Use Filament page header configuration --}}

        <div id="users_table" class="card">
            {{-- Start DataTable --}}
                {{-- Vue slot removed --}}
                    <div class="p-4 pl-0 text-center w-full dark:text-gray-400">
                        <i class="fa fa-info-circle empty-icon"></i>
                        <p>{{ __('admin.user.no_users') }}</p>
                        {{-- Button (self-closing) --}}
                    </div>
                {{-- End Vue slot --}}

                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        <div class="flex items-center">
                            {{-- Avatar (self-closing) --}}
                            <span>{{ data.first_name + ' ' + data.last_name }}</span>
                        </div>
                    {{-- End Vue slot --}}

                    {{-- Vue slot removed --}}
                        <InputText placeholder="Search by name" />
                    {{-- End Vue slot --}}
                {{-- End Column --}}
                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        {{ data.email }}
                    {{-- End Vue slot --}}
                    {{-- Vue slot removed --}}
                        <InputText placeholder="Search by email" />
                    {{-- End Vue slot --}}
                {{-- End Column --}}
                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        {{-- Tag (self-closing) --}}
                    {{-- End Vue slot --}}
                {{-- End Column --}}

                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        {{-- Tag (self-closing) --}}
                        {{-- Tag (self-closing) --}}
                    {{-- End Vue slot --}}

                    {{-- Vue slot removed --}}
                        <Select
                            option-label="label"
                            option-value="value"
                            placeholder="Search by status"
                        />
                    {{-- End Vue slot --}}
                {{-- End Column --}}
                {{-- Vue slot removed --}}
                    {{-- Button (self-closing) --}}
                {{-- End Vue slot --}}
            {{-- End DataTable --}}
        </div>
    

</x-filament-panels::page>
