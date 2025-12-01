<x-filament-panels::page>
{{--
    Converted from Vue: CreateRole.vue
    
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
                <form class="formgrid">
                    {{-- TextInput (self-closing) --}}
                    {{-- TextAreaInput (self-closing) --}}
                    <div id="permissions" class="my-2">
                        <h3>{{ __('form.permissions') }}</h3>
                        <div class="flex flex-wrap gap-2">
                            <div class="flex items-center gap-2">
                                <Checkbox name="permission" class="mr-1" />
                                <label>{{ permission.display_name }}</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div id="function_buttons" class="flex justify-end mt-4 gap-2">
                {{-- Button (self-closing) --}}
                {{-- Button (self-closing) --}}
            </div>
        
    

</x-filament-panels::page>
