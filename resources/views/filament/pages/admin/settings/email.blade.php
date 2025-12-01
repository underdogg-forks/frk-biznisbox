<x-filament-panels::page>
{{--
    Converted from Vue: Email.vue
    
    CONVERSION NOTES:
    - All Vue directives (v-if, v-for, @click, :prop, etc.) have been removed
    - Vue components have been commented out - replace with Filament/Blade equivalents
    - {{ }} expressions are preserved but may reference Vue data - update as needed
    - Translation calls $t() have been converted to __()
    - This file requires significant manual work to become functional
--}}


    {{-- DefaultLayout removed: Using Filament page structure --}}
        {{-- LoadingScreen removed --}}
            <PageHeader />

            <div class="card">
                <form>
                    {{-- SelectInput (self-closing) --}}

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                        {{-- TextInput (self-closing) --}}
                        {{-- TextInput (self-closing) --}}
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                        {{-- TextInput (self-closing) --}}
                        {{-- TextInput (self-closing) --}}
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                        {{-- SelectInput (self-closing) --}}
                        {{-- TextInput (self-closing) --}}
                    </div>

                    {{-- TextInput (self-closing) --}}

                    {{-- TextInput (self-closing) --}}
                </form>
            </div>
            <div id="function_buttons" class="flex justify-end mt-4 gap-2 mb-5">
                {{-- Button (self-closing) --}}
            </div>

            <div class="card">
                <div id="test_email_header" class="flex justify-between">
                    <h2 class="text-xl dark:text-surface-200">{{ __('admin.mail.send_test_email') }}</h2>
                </div>

                <div class="flex flex-col gap-2 mb-2">
                    <label for="input_send_details_to" class="dark:text-surface-200">
                        {{ __('admin.mail.send_test_email_to') }}
                    </label>
                    {{-- AutoComplete (self-closing) --}}
                </div>
            </div>

            <div id="function_buttons" class="flex justify-end mt-4 gap-2">
                {{-- Button (self-closing) --}}
            </div>
        
    

</x-filament-panels::page>
