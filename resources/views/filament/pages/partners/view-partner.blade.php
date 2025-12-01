<x-filament-panels::page>
{{--
    Converted from Vue: ViewPartner.vue
    
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

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-3">
                <div class="grid grid-cols-1 lg:col-span-4">
                    <div class="card">
                        <div class="font-bold mb-4">
                            <h3>{{ __('partner.partner_details') }}</h3>
                        </div>
                        {{-- DisplayData (self-closing) --}}
                        {{-- DisplayData (self-closing) --}}
                        <div class="grid md:grid-cols-2 gap-2">
                            <div>
                                {{-- Tag (self-closing) --}}
                                {{-- Tag (self-closing) --}}
                                {{-- Tag (self-closing) --}}
                                {{-- Tag (self-closing) --}}
                            </div>
                            <div>
                                {{-- Tag (self-closing) --}}
                                {{-- Tag (self-closing) --}}
                            </div>
                        </div>
                        {{-- DisplayData (self-closing) --}}
                        {{-- DisplayData (self-closing) --}}
                        {{-- DisplayData (self-closing) --}}
                        {{-- DisplayData (self-closing) --}}
                        {{-- DisplayData (self-closing) --}}
                        {{-- DisplayData (self-closing) --}}
                        {{-- DisplayData (self-closing) --}}
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:col-span-8">
                    <div class="card">
                        <Tabs value="partner_activities" scrollable>
                            <TabList>
                                <Tab value="partner_activities">{{ __('partner.partner_activities') }}</Tab>
                                <Tab value="contact_information">{{ __('partner.contact_information') }}</Tab>
                                <Tab value="addresses">{{ __('partner.addresses') }}</Tab>
                                <Tab value="invoices">{{ __('invoice.invoice', 2) }}</Tab>
                                <Tab value="quotes">{{ __('quote.quote', 2) }}</Tab>
                                <Tab value="bills">{{ __('bill.bill', 2) }}</Tab>
                                <Tab value="transactions">{{ __('transaction.transaction', 2) }}</Tab>
                                <Tab value="support">{{ __('support.support') }}</Tab>
                                <Tab value="archive_documents">{{ __('archive.archive') }}</Tab>
                            </TabList>

                            <TabPanels>
                                <!-- Partner activities tab -->
                                {{-- Start TabPanel --}}
                                    <div>
                                        <div class="flex justify-between items-center">
                                            <h3 class="font-bold mb-4 dark:text-surface-200">{{ __('partner.activities') }}</h3>
                                            {{-- Button (self-closing) --}}
                                        </div>
                                        <div id="activities_timeline">
                                            {{-- Start Timeline --}}
                                                {{-- Vue slot removed --}}
                                                    <span
                                                        class="flex w-8 h-8 items-center justify-center text-primary rounded-full border border-primary z-10 shadow-sm"
                                                    >
                                                        <span class="fa fa-phone"></span>
                                                        <span class="fa fa-tasks"></span>
                                                        <span class="fa fa-video"></span>
                                                        <span class="fa fa-users"></span>
                                                        <span class="fa fa-envelope"></span>
                                                        <span class="fa fa-map-marker"></span>
                                                        <span class="fa fa-sticky-note"></span>
                                                        <span class="fa fa-ellipsis-h"></span>
                                                    </span>
                                                {{-- End Vue slot --}}

                                                {{-- Vue slot removed --}}
                                                    <div class="flex flex-col mt-2">
                                                        <div class="grid grid-cols-3 gap-2">
                                                            <span class="text-left font-bold dark:text-surface-200">{{
                                                                slotProps.item.subject
                                                            }}</span>
                                                            <span
                                                                class="ml-2 text-sm dark:text-surface-200"
                                                                >{{
                                                                    formatDateTime(slotProps.item.start_date) +
                                                                    ' - ' +
                                                                    formatDateTime(slotProps.item.end_date)
                                                                }}</span
                                                            >
                                                        </div>

                                                        <div class="flex">
                                                            <div>
                                                                {{-- Tag (self-closing) --}}
                                                                {{-- Tag (self-closing) --}}
                                                                {{-- Tag (self-closing) --}}
                                                                {{-- Tag (self-closing) --}}
                                                                {{-- Tag (self-closing) --}}
                                                                {{-- Tag (self-closing) --}}
                                                            </div>
                                                            <div class="ml-2">
                                                                {{-- Tag (self-closing) --}}
                                                                {{-- Tag (self-closing) --}}
                                                                {{-- Tag (self-closing) --}}
                                                                {{-- Tag (self-closing) --}}
                                                            </div>
                                                        </div>
                                                        <div class="grid">
                                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                                                <div>
                                                                    <div class="block text-sm dark:text-surface-200">
                                                                        {{ slotProps.item.location }}
                                                                    </div>
                                                                    <div class="block text-sm dark:text-surface-200">
                                                                        {{ slotProps.item.notes }}
                                                                    </div>
                                                                    <div class="block text-sm dark:text-surface-200">
                                                                        {{ slotProps.item.outcome }}
                                                                    </div>
                                                                    <div
                                                                        class="block text-sm dark:text-surface-200"
                                                                    >
                                                                        <span></span>
                                                                    </div>
                                                                </div>

                                                                <div class="flex gap-2 mt-2">
                                                                    {{-- Button (self-closing) --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                {{-- End Vue slot --}}
                                            {{-- End Timeline --}}
                                        </div>

                                        <div>
                                            <div class="p-4 pl-0 text-center w-full">
                                                <i class="fa fa-info-circle empty-icon"></i>
                                            </div>
                                            <p class="text-center">{{ __('partner.no_activities') }}</p>
                                            <div class="flex justify-center mt-4">
                                                {{-- Button (self-closing) --}}
                                            </div>
                                        </div>
                                    </div>
                                {{-- End TabPanel --}}

                                <!-- Contacts table -->
                                {{-- Start TabPanel --}}
                                    {{-- Start DataTable --}}
                                        {{-- Vue slot removed --}}
                                            <div class="p-4 pl-0 text-center w-full dark:text-gray-400">
                                                <i class="fa fa-info-circle empty-icon"></i>
                                                <p>{{ __('partner.no_contacts') }}</p>
                                            </div>
                                        {{-- End Vue slot --}}
                                        {{-- Start Column --}}
                                            {{-- Vue slot removed --}}
                                                <div class="flex gap-2">
                                                    <i class="fa fa-star text-yellow-500 mr-2"></i>
                                                    <span>{{ data.name }}</span>
                                                </div>
                                            {{-- End Vue slot --}}
                                        {{-- End Column --}}
                                        {{-- Column (self-closing) --}}
                                        {{-- Start Column --}}
                                            {{-- Vue slot removed --}}
                                                <span
                                                    class="cursor-pointer text-blue-600 hover:underline"
                                                >
                                                    {{ data.email }}</span
                                                >
                                            {{-- End Vue slot --}}
                                        {{-- End Column --}}
                                        {{-- Start Column --}}
                                            {{-- Vue slot removed --}}
                                                <a>{{ data.phone_number }}</a>
                                            {{-- End Vue slot --}}
                                        {{-- End Column --}}
                                        {{-- Start Column --}}
                                            {{-- Vue slot removed --}}
                                                <a>{{ data.mobile_number }}</a>
                                            {{-- End Vue slot --}}
                                        {{-- End Column --}}
                                        {{-- Column (self-closing) --}}
                                        {{-- Start Column --}}
                                            {{-- Vue slot removed --}}
                                                {{-- Tag (self-closing) --}}
                                                <div>
                                                    {{-- Button (self-closing) --}}
                                                </div>
                                            {{-- End Vue slot --}}
                                        {{-- End Column --}}
                                    {{-- End DataTable --}}
                                {{-- End TabPanel --}}

                                <!-- Addresses table -->
                                {{-- Start TabPanel --}}
                                    {{-- Start DataTable --}}
                                        {{-- Vue slot removed --}}
                                            <div class="p-4 pl-0 text-center w-full dark:text-gray-400">
                                                <i class="fa fa-info-circle empty-icon"></i>
                                                <p>{{ __('partner.no_addresses') }}</p>
                                            </div>
                                        {{-- End Vue slot --}}

                                        {{-- Start Column --}}
                                            {{-- Vue slot removed --}}
                                                <div class="flex gap-2">
                                                    <i class="fa fa-star text-yellow-500 mr-2"></i>
                                                    {{-- Tag (self-closing) --}}
                                                    {{-- Tag (self-closing) --}}
                                                    {{-- Tag (self-closing) --}}
                                                    {{-- Tag (self-closing) --}}
                                                </div>
                                            {{-- End Vue slot --}}
                                        {{-- End Column --}}
                                        {{-- Column (self-closing) --}}
                                        {{-- Column (self-closing) --}}
                                        {{-- Column (self-closing) --}}
                                        {{-- Start Column --}}
                                            {{-- Vue slot removed --}}
                                                {{ formatCountry(slotProps.data.country) }}
                                            {{-- End Vue slot --}}
                                        {{-- End Column --}}
                                        {{-- Column (self-closing) --}}
                                    {{-- End DataTable --}}
                                {{-- End TabPanel --}}

                                <!-- Invoices table -->
                                {{-- Start TabPanel --}}
                                    {{-- Start DataTable --}}
                                        {{-- Vue slot removed --}}
                                            <div class="p-4 pl-0 text-center w-full dark:text-gray-400">
                                                <i class="fa fa-info-circle empty-icon"></i>
                                                <p>{{ __('invoice.no_invoices') }}</p>
                                            </div>
                                        {{-- End Vue slot --}}
                                        {{-- Column (self-closing) --}}
                                        {{-- Start Column --}}
                                            {{-- Vue slot removed --}}
                                                <div>{{ data.date ? formatDate(data.date) : '' }}</div>
                                                <div>{{ data.due_date ? formatDate(data.due_date) : '' }}</div>
                                            {{-- End Vue slot --}}
                                        {{-- End Column --}}
                                        {{-- Start Column --}}
                                            {{-- Vue slot removed --}}
                                                {{ formatMoney(data.total, data.currency) }}
                                            {{-- End Vue slot --}}
                                        {{-- End Column --}}
                                        {{-- Start Column --}}
                                            {{-- Vue slot removed --}}
                                                {{-- Tag (self-closing) --}}
                                                {{-- Tag (self-closing) --}}
                                                {{-- Tag (self-closing) --}}
                                                {{-- Tag (self-closing) --}}
                                                {{-- Tag (self-closing) --}}
                                                {{-- Tag (self-closing) --}}
                                                {{-- Tag (self-closing) --}}
                                            {{-- End Vue slot --}}
                                        {{-- End Column --}}
                                    {{-- End DataTable --}}
                                {{-- End TabPanel --}}

                                <!-- Quotes table -->
                                {{-- Start TabPanel --}}
                                    <div id="quote_table">
                                        {{-- Start DataTable --}}
                                            {{-- Vue slot removed --}}
                                                <div class="p-4 pl-0 text-center w-full dark:text-gray-400">
                                                    <i class="fa fa-info-circle empty-icon"></i>
                                                    <p>{{ __('quote.no_quotes') }}</p>
                                                </div>
                                            {{-- End Vue slot --}}
                                            {{-- Start Column --}}
                                                {{-- Vue slot removed --}}
                                                    {{ data.number }}
                                                {{-- End Vue slot --}}
                                            {{-- End Column --}}
                                            {{-- Start Column --}}
                                                {{-- Vue slot removed --}}
                                                    <span>{{ data.date ? formatDate(data.date) : '' }}</span> <br />
                                                    <span>{{ data.valid_until ? formatDate(data.valid_until) : '' }}</span>
                                                {{-- End Vue slot --}}
                                            {{-- End Column --}}
                                            {{-- Start Column --}}
                                                {{-- Vue slot removed --}}
                                                    {{ formatText(data.customer_name) }} <br />
                                                    {{ formatText(data.payer_name) }}
                                                {{-- End Vue slot --}}
                                            {{-- End Column --}}
                                            {{-- Start Column --}}
                                                {{-- Vue slot removed --}}
                                                    {{ formatMoney(data.total, data.currency) }}
                                                {{-- End Vue slot --}}
                                            {{-- End Column --}}
                                            {{-- Start Column --}}
                                                {{-- Vue slot removed --}}
                                                    {{-- Tag (self-closing) --}}
                                                    {{-- Tag (self-closing) --}}
                                                    {{-- Tag (self-closing) --}}
                                                    {{-- Tag (self-closing) --}}
                                                    {{-- Tag (self-closing) --}}
                                                    {{-- Tag (self-closing) --}}
                                                    {{-- Tag (self-closing) --}}
                                                    {{-- Tag (self-closing) --}}
                                                {{-- End Vue slot --}}
                                            {{-- End Column --}}
                                        {{-- End DataTable --}}
                                    </div>
                                {{-- End TabPanel --}}

                                <!-- Bills tab -->
                                {{-- Start TabPanel --}}
                                    <div id="bills_table">
                                        {{-- Start DataTable --}}
                                            {{-- Vue slot removed --}}
                                                <div class="p-4 pl-0 text-center w-full dark:text-gray-400">
                                                    <i class="fa fa-info-circle empty-icon"></i>
                                                    <p>{{ __('bill.no_bills') }}</p>
                                                </div>
                                            {{-- End Vue slot --}}

                                            {{-- Column (self-closing) --}}
                                            {{-- Start Column --}}
                                                {{-- Vue slot removed --}}
                                                    {{ data.supplier_name }}
                                                {{-- End Vue slot --}}
                                            {{-- End Column --}}
                                            {{-- Start Column --}}
                                                {{-- Vue slot removed --}}
                                                    <span class="date">{{ data.date ? formatDate(data.date) : '-' }}</span> <br />
                                                    <span class="due_date">{{ data.due_date ? formatDate(data.due_date) : '-' }}</span>
                                                {{-- End Vue slot --}}
                                            {{-- End Column --}}
                                            {{-- Start Column --}}
                                                {{-- Vue slot removed --}}
                                                    <div class="status">
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
                                                    {{ data.total + ' ' + data.currency }}
                                                {{-- End Vue slot --}}
                                            {{-- End Column --}}
                                        {{-- End DataTable --}}
                                    </div>
                                {{-- End TabPanel --}}

                                <!-- Transactions tab -->
                                {{-- Start TabPanel --}}
                                    <div id="transactions_table">
                                        {{-- Start DataTable --}}
                                            {{-- Vue slot removed --}}
                                                <div class="p-4 pl-0 text-center w-full dark:text-gray-400">
                                                    <i class="fa fa-info-circle empty-icon"></i>
                                                    <p>{{ __('transaction.no_transactions') }}</p>
                                                </div>
                                            {{-- End Vue slot --}}

                                            {{-- Start Column --}}
                                                {{-- Vue slot removed --}}
                                                    <span>{{ data.name ? data.name : '-' }}</span>
                                                {{-- End Vue slot --}}
                                            {{-- End Column --}}

                                            {{-- Start Column --}}
                                                {{-- Vue slot removed --}}
                                                    <span>{{ data.date ? formatDate(data.date) : '-' }}</span
                                                    ><br />
                                                    <span>{{ data.number }}</span>
                                                {{-- End Vue slot --}}
                                            {{-- End Column --}}

                                            {{-- Start Column --}}
                                                {{-- Vue slot removed --}}
                                                    <span>{{ data.amount ? formatMoney(data.amount, data.currency) : '-' }}</span> <br />
                                                {{-- End Vue slot --}}
                                            {{-- End Column --}}

                                            {{-- Start Column --}}
                                                {{-- Vue slot removed --}}
                                                    <span>
                                                        <i class="fa fa-arrow-up text-green-500 mr-2"></i>
                                                        <span>{{ __('transaction_type.income') }}</span>
                                                    </span>
                                                    <span>
                                                        <i class="fa fa-arrow-down text-red-500 mr-2"></i>
                                                        <span>{{ __('transaction_type.expense') }}</span>
                                                    </span>
                                                    <span>
                                                        <i class="fa fa-exchange-alt text-blue-500 mr-2"></i>
                                                        <span>{{ __('transaction_type.transfer') }}</span>
                                                    </span>
                                                {{-- End Vue slot --}}
                                            {{-- End Column --}}

                                            {{-- Start Column --}}
                                                {{-- Vue slot removed --}}
                                                    {{ data.account ? data.account?.name : '-' }}
                                                {{-- End Vue slot --}}
                                            {{-- End Column --}}
                                        {{-- End DataTable --}}
                                    </div>
                                {{-- End TabPanel --}}

                                <!-- Support tab -->
                                {{-- Start TabPanel --}}
                                    {{-- Start DataTable --}}
                                        {{-- Vue slot removed --}}
                                            <div class="p-4 pl-0 text-center w-full dark:text-gray-400">
                                                <i class="fa fa-info-circle empty-icon"></i>
                                                <p>{{ __('support.no_support_tickets') }}</p>
                                            </div>
                                        {{-- End Vue slot --}}
                                        {{-- Column (self-closing) --}}
                                        {{-- Column (self-closing) --}}
                                        {{-- Start Column --}}
                                            {{-- Vue slot removed --}}
                                                {{-- Tag (self-closing) --}}
                                                {{-- Tag (self-closing) --}}
                                                {{-- Tag (self-closing) --}}
                                                {{-- Tag (self-closing) --}}
                                                {{-- Tag (self-closing) --}}
                                            {{-- End Vue slot --}}
                                        {{-- End Column --}}
                                    {{-- End DataTable --}}
                                {{-- End TabPanel --}}

                                <!-- Archive documents tab -->
                                {{-- Start TabPanel --}}
                                    <div id="archive_documents_table">
                                        {{-- Start DataTable --}}
                                            {{-- Vue slot removed --}}
                                                <div class="p-4 pl-0 text-center w-full dark:text-gray-400">
                                                    <i class="fa fa-info-circle empty-icon"></i>
                                                    <p>{{ __('archive.no_documents') }}</p>
                                                </div>
                                            {{-- End Vue slot --}}
                                            {{-- Start Column --}}
                                                {{-- Vue slot removed --}}
                                                    <div class="flex items-center">
                                                        <span></span>
                                                        <span class="ml-2">{{ data.name }}</span>
                                                    </div>
                                                {{-- End Vue slot --}}
                                            {{-- End Column --}}
                                            {{-- Start Column --}}
                                                {{-- Vue slot removed --}}
                                                    <span>{{ formatDateTime(data.created_at) }}</span>
                                                {{-- End Vue slot --}}
                                            {{-- End Column --}}
                                            {{-- Start Column --}}
                                                {{-- Vue slot removed --}}
                                                    <span>{{ formatFileSize(data.file_size) }}</span>
                                                {{-- End Vue slot --}}
                                            {{-- End Column --}}
                                        {{-- End DataTable --}}
                                    </div>
                                {{-- End TabPanel --}}
                            </TabPanels>
                        </Tabs>
                    </div>
                </div>
            </div>
            <div id="function_buttons" class="flex justify-end mt-4 gap-2">
                {{-- Button (self-closing) --}}
            </div>
        

        <!-- Send email to partner contact dialog -->
        {{-- Start Dialog --}}
            <div id="send_email_form">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    {{-- SelectInput (self-closing) --}}
                    {{-- TextInput (self-closing) --}}
                </div>

                {{-- TinyMceEditor (self-closing) --}}
            </div>

            {{-- Vue slot removed --}}
                <div id="function_buttons" class="flex justify-end gap-2">
                    {{-- Button (self-closing) --}}
                    {{-- Button (self-closing) --}}
                </div>
            {{-- End Vue slot --}}
        {{-- End Dialog --}}

        <!-- Edit add activity dialog -->
        {{-- Start Dialog --}}
            <div id="add_edit_activity_form">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    {{-- SelectInput (self-closing) --}}
                    {{-- SelectInput (self-closing) --}}
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    {{-- SelectInput (self-closing) --}}

                    {{-- SelectInput (self-closing) --}}
                </div>

                {{-- TextInput (self-closing) --}}
                {{-- TinyMceEditor (self-closing) --}}
                {{-- TextAreaInput (self-closing) --}}

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    {{-- DateInput (self-closing) --}}
                    {{-- DateInput (self-closing) --}}
                </div>

                {{-- TextAreaInput (self-closing) --}}
                {{-- TextAreaInput (self-closing) --}}
            </div>

            {{-- Vue slot removed --}}
                <div id="function_buttons" class="flex justify-end gap-2">
                    {{-- Button (self-closing) --}}

                    {{-- Button (self-closing) --}}
                    {{-- Button (self-closing) --}}
                </div>
            {{-- End Vue slot --}}
        {{-- End Dialog --}}

        <!--Audit log dialog -->
        {{-- Start Dialog --}}
            {{-- AuditLog (self-closing) --}}
        {{-- End Dialog --}}
    

</x-filament-panels::page>
