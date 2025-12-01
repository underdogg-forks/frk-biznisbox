<x-filament-panels::page>
{{--
    Converted from Vue: Webhooks.vue
    
    CONVERSION NOTES:
    - All Vue directives (v-if, v-for, @click, :prop, etc.) have been removed
    - Vue components have been commented out - replace with Filament/Blade equivalents
    - {{ }} expressions are preserved but may reference Vue data - update as needed
    - Translation calls $t() have been converted to __()
    - This file requires significant manual work to become functional
--}}


    {{-- DefaultLayout removed: Using Filament page structure --}}
        {{-- PageHeader removed: Use Filament page header configuration --}}

        <div id="webhook_subscriptions_table" class="card">
            {{-- Start DataTable --}}
                {{-- Vue slot removed --}}
                    <div class="p-4 pl-0 text-center w-full dark:text-gray-400">
                        <i class="fa fa-info-circle empty-icon"></i>
                        <p>{{ __('admin.webhook.no_webhook_subscriptions') }}</p>
                    </div>
                {{-- End Vue slot --}}

                {{-- Column (self-closing) --}}
                {{-- Column (self-closing) --}}
                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        {{-- Tag (self-closing) --}}
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
                    {{-- End Vue slot --}}
                {{-- End Column --}}
            {{-- End DataTable --}}
        </div>

        <!-- New / Edit Webhook Subscription Dialog -->
        {{-- Start Dialog --}}
            {{-- LoadingScreen removed --}}
                <form>
                    {{-- TextInput (self-closing) --}}
                    {{-- TextInput (self-closing) --}}
                    {{-- TextInput (self-closing) --}}
                    {{-- SelectInput (self-closing) --}}
                    <MultiSelectInput
                        optionLabel="name"
                        optionValue="name"
                    />

                    <div class="flex gap-2 my-4">
                        {{-- Button (self-closing) --}}
                    </div>

                    <div class="flex gap-2 objects-center">
                        {{-- TextInput (self-closing) --}}
                        {{-- TextInput (self-closing) --}}
                        {{-- Button (self-closing) --}}
                    </div>
                </form>
            

            {{-- Vue slot removed --}}
                <div id="function_buttons" class="flex gap-2 flex-wrap">
                    <div class="flex justify-content-end">
                        {{-- Button (self-closing) --}}
                    </div>
                    <div class="flex-grow"></div>
                    <div class="flex justify-content-end gap-2 flex-wrap">
                        {{-- Button (self-closing) --}}
                        {{-- Button (self-closing) --}}
                    </div>
                </div>
            {{-- End Vue slot --}}
        {{-- End Dialog --}}
    

</x-filament-panels::page>
