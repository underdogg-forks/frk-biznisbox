<x-filament-panels::page>
{{--
    Converted from Vue: ViewRole.vue
    
    CONVERSION NOTES:
    - All Vue directives (v-if, v-for, @click, :prop, etc.) have been removed
    - Vue components have been commented out - replace with Filament/Blade equivalents
    - {{ }} expressions are preserved but may reference Vue data - update as needed
    - Translation calls $t() have been converted to __()
    - This file requires significant manual work to become functional
--}}


    {{-- DefaultLayout removed: Using Filament page structure --}}
        {{-- LoadingScreen removed --}}
            {{-- PageHeader removed: Use Filament page header configuration --}}

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="card">
                    {{-- DisplayData (self-closing) --}}
                    {{-- Start DisplayData --}}
                        {{-- Tag (self-closing) --}}
                    {{-- End DisplayData --}}
                    {{-- DisplayData (self-closing) --}}
                    {{-- Start DisplayData --}}
                        <div class="flex flex-wrap gap-2">
                            <div class="flex items-center gap-2">
                                <Checkbox name="permission" class="mr-1" disabled />
                                <label>{{ permission.display_name }}</label>
                            </div>
                        </div>
                    {{-- End DisplayData --}}
                </div>

                <div id="users" class="card">
                    <span class="text-xl font-bold">{{ __('admin.role.users_with_role') }}</span>

                    {{-- Start DataTable --}}
                        {{-- Vue slot removed --}}
                            <div class="p-4 pl-0 text-center w-full">
                                <i class="fa fa-info-circle empty-icon"></i>
                                <p>{{ __('admin.role.no_users') }}</p>
                            </div>
                        {{-- End Vue slot --}}
                        {{-- Start Column --}}
                            {{-- Vue slot removed --}}
                                <div class="flex items-center">
                                    {{-- Avatar (self-closing) --}}
                                    <span>{{ data.first_name + ' ' + data.last_name }}</span>
                                </div>
                            {{-- End Vue slot --}}
                        {{-- End Column --}}
                        {{-- Column (self-closing) --}}
                    {{-- End DataTable --}}
                </div>
            </div>
        

        <div id="function_buttons" class="flex justify-end mt-4 gap-2">
            {{-- Button (self-closing) --}}
        </div>

        <!-- Audit log dialog -->
        {{-- Start Dialog --}}
            {{-- AuditLog (self-closing) --}}
        {{-- End Dialog --}}
    

</x-filament-panels::page>
