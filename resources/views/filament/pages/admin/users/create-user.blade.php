<x-filament-panels::page>
{{--
    Converted from Vue: CreateUser.vue
    
    CONVERSION NOTES:
    - All Vue directives (v-if, v-for, @click, :prop, etc.) have been removed
    - Vue components have been commented out - replace with Filament/Blade equivalents
    - {{ }} expressions are preserved but may reference Vue data - update as needed
    - Translation calls $t() have been converted to __()
    - This file requires significant manual work to become functional
--}}


    {{-- DefaultLayout removed: Using Filament page structure --}}
        <PageHeader />

        {{-- LoadingScreen removed --}}
            <div class="card">
                <form class="formgrid">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        {{-- TextInput (self-closing) --}}
                        {{-- TextInput (self-closing) --}}
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                        <div class="grid-col-1 md:col-span-3">
                            <SelectButtonInput
                                id="input_active"
                            />
                        </div>
                        <div class="grid-col-1 md:col-span-9">
                            {{-- TextInput (self-closing) --}}
                        </div>
                    </div>

                    {{-- SelectInput (self-closing) --}}

                    {{-- SelectInput (self-closing) --}}

                    <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center">
                        <div class="col-span-1 md:col-span-3">
                            <Checkbox binary />
                            <label class="ml-2">{{ __('admin.user.auto_generate_password') }}</label>
                        </div>
                        <div class="col-span-1 md:col-span-9">
                            {{-- TextInput (self-closing) --}}
                        </div>
                    </div>

                    <div class="grid">
                        <div class="flex flex-col gap-2 mb-2">
                            <label for="input_send_details_to" class="dark:text-surface-200"> {{ __('admin.user.send_details_to') }}</label>
                            {{-- AutoComplete (self-closing) --}}
                        </div>
                    </div>
                </form>
            </div>
            <div id="function_buttons" class="flex justify-end gap-2 mt-4">
                {{-- Button (self-closing) --}}
                {{-- Button (self-closing) --}}
            </div>
        
    

</x-filament-panels::page>
