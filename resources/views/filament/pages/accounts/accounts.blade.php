<x-filament-panels::page>
{{--
    Converted from Vue: Accounts.vue
    
    CONVERSION NOTES:
    - All Vue directives (v-if, v-for, @click, :prop, etc.) have been removed
    - Vue components have been commented out - replace with Filament/Blade equivalents
    - {{ }} expressions are preserved but may reference Vue data - update as needed
    - Translation calls $t() have been converted to __()
    - This file requires significant manual work to become functional
--}}


    {{-- DefaultLayout removed: Using Filament page structure --}}
        {{-- PageHeader removed: Use Filament page header configuration --}}

        <div id="accounts_table" class="card">
            {{-- Start DataTable --}}
                {{-- Vue slot removed --}}
                    <div class="p-4 pl-0 text-center w-full dark:text-gray-400">
                        <i class="fa fa-info-circle empty-icon"></i>
                        <p>{{ __('account.no_accounts') }}</p>
                        {{-- Button (self-closing) --}}
                    </div>
                {{-- End Vue slot --}}
                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        {{ formatText(data.name) }} <br />
                        {{ formatText(data.account_number) }}
                    {{-- End Vue slot --}}

                    {{-- Vue slot removed --}}
                        <InputText type="text" placeholder="Search by name" />
                    {{-- End Vue slot --}}
                {{-- End Column --}}

                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        {{-- Tag (self-closing) --}}
                        {{-- Tag (self-closing) --}}
                    {{-- End Vue slot --}}
                {{-- End Column --}}

                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        {{-- Start Tag --}}{{-- End Tag --}}
                        {{-- Start Tag --}}{{-- End Tag --}}
                        {{-- Start Tag --}}{{-- End Tag --}}
                    {{-- End Vue slot --}}

                    {{-- Vue slot removed --}}
                        <Select
                            option-label="label"
                            option-value="value"
                            placeholder="Select type"
                        />
                    {{-- End Vue slot --}}
                {{-- End Column --}}
                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        <span>
                            {{ formatMoney(data.current_balance, data.currency) }}
                        </span>
                    {{-- End Vue slot --}}
                    {{-- Vue slot removed --}}
                        <InputText type="text" placeholder="Search by balance" />
                    {{-- End Vue slot --}}
                {{-- End Column --}}
                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        <span>{{ formatText(data.bank_name) }}</span>
                    {{-- End Vue slot --}}
                    {{-- Vue slot removed --}}
                        <InputText type="text" placeholder="Search by bank name" />
                    {{-- End Vue slot --}}
                {{-- End Column --}}
                {{-- Vue slot removed --}}
                    {{-- Button (self-closing) --}}
                {{-- End Vue slot --}}
            {{-- End DataTable --}}
        </div>

        <!-- Dialog connect bank account -->
        {{-- Start Dialog --}}
            <div>
                {{-- LoadingScreen removed --}}
                    {{-- SelectInput (self-closing) --}}

                    <div>
                        <div class="flex flex-col gap-2 mb-2">
                            <label class="dark:text-surface-200">{{ __('form.bank') }}</label>
                            <Select
                                option-label="name"
                                option-value="id"
                                placeholder="Select bank"
                            >
                                {{-- Vue slot removed --}}
                                    <div class="flex align-content-center flex-wrap">
                                        {{-- Avatar (self-closing) --}}
                                        <span class="flex ml-2">{{ slotProps.option.name }}</span>
                                    </div>
                                {{-- End Vue slot --}}
                            </Select>
                        </div>
                    </div>
                
            </div>
            {{-- Vue slot removed --}}
                <div class="flex justify-end gap-2">
                    {{-- Button (self-closing) --}}
                    {{-- Button (self-closing) --}}
                </div>
            {{-- End Vue slot --}}
        {{-- End Dialog --}}
    

</x-filament-panels::page>
