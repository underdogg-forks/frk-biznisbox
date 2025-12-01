<x-filament-panels::page>
{{--
    Converted from Vue: SupportTickets.vue
    
    CONVERSION NOTES:
    - All Vue directives (v-if, v-for, @click, :prop, etc.) have been removed
    - Vue components have been commented out - replace with Filament/Blade equivalents
    - {{ }} expressions are preserved but may reference Vue data - update as needed
    - Translation calls $t() have been converted to __()
    - This file requires significant manual work to become functional
--}}


    {{-- DefaultLayout removed: Using Filament page structure --}}
        {{-- PageHeader removed: Use Filament page header configuration --}}

        <div id="support_tickets_table" class="card">
            {{-- Start DataTable --}}
                {{-- Vue slot removed --}}
                    <div class="p-4 pl-0 text-center w-full dark:text-gray-400">
                        <i class="fa fa-info-circle empty-icon"></i>
                        <p>{{ __('support.no_support_tickets') }}</p>
                        {{-- Button (self-closing) --}}
                    </div>
                {{-- End Vue slot --}}
                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        <span>{{ data.number }}</span>
                        <br />
                        <span
                            ><b>{{ data.subject }}</b></span
                        >
                    {{-- End Vue slot --}}
                {{-- End Column --}}
                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        <div class="flex items-center my-2">
                            {{-- Tag (self-closing) --}}
                            {{-- Tag (self-closing) --}}
                            {{-- Tag (self-closing) --}}
                            {{-- Tag (self-closing) --}}
                            {{-- Tag (self-closing) --}}
                        </div>

                        <div class="flex items-center my-2">
                            {{-- Tag (self-closing) --}}
                            {{-- Tag (self-closing) --}}
                            {{-- Tag (self-closing) --}}
                            {{-- Tag (self-closing) --}}
                            {{-- Tag (self-closing) --}}
                            {{-- Tag (self-closing) --}}
                        </div>
                    {{-- End Vue slot --}}
                {{-- End Column --}}
                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        <!-- Partner  is in system -->
                        <span>{{ data.partner?.name }}</span>
                        <!-- Custom partner -->
                        <span>{{ `${data.contact_name}` }}</span>
                        <span>-</span>
                    {{-- End Vue slot --}}
                {{-- End Column --}}
                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        <span>{{ `${data.assignee?.first_name} ${data.assignee?.last_name}` }}</span>
                        <span>-</span>
                    {{-- End Vue slot --}}
                {{-- End Column --}}
                {{-- Vue slot removed --}}
                    {{-- Button (self-closing) --}}
                {{-- End Vue slot --}}
            {{-- End DataTable --}}
        </div>
    

</x-filament-panels::page>
