<x-filament-panels::page>
{{--
    Converted from Vue: Departments.vue
    
    CONVERSION NOTES:
    - All Vue directives (v-if, v-for, @click, :prop, etc.) have been removed
    - Vue components have been commented out - replace with Filament/Blade equivalents
    - {{ }} expressions are preserved but may reference Vue data - update as needed
    - Translation calls $t() have been converted to __()
    - This file requires significant manual work to become functional
--}}


    {{-- DefaultLayout removed: Using Filament page structure --}}
        {{-- PageHeader removed: Use Filament page header configuration --}}

        <div id="departments_table" class="card">
            {{-- Start DataTable --}}
                {{-- Vue slot removed --}}
                    <div class="p-4 pl-0 text-center w-full dark:text-gray-400">
                        <i class="fa fa-info-circle empty-icon"></i>
                        <p>{{ __('admin.department.no_departments') }}</p>
                        {{-- Button (self-closing) --}}
                    </div>
                {{-- End Vue slot --}}
                {{-- Column (self-closing) --}}
                {{-- Column (self-closing) --}}
                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        <span>{{ formatText(data.address) }}</span> <br />
                        <span>{{ formatText(data.zip_code) + ' ' + formatText(data.city) }}</span> <br />
                        <span>{{ formatText(data.country) }}</span>
                    {{-- End Vue slot --}}
                {{-- End Column --}}
            {{-- End DataTable --}}
        </div>
    

</x-filament-panels::page>
