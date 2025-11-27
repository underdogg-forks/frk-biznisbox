{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout>
        <LoadingScreen :blocked="loadingData">
            <PageHeader :title="$t('invoice.new_invoice', 3)" />

            <form>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
                    <TextInput
                        id="number_input"
                        v-model="v$.invoice.number.$model"
                        disabled
                        :label="$t('form.number')"
                        :validate="v$.invoice.number"
                    />
                    <SelectInput
                        id="status_input"
                        v-model="v$.invoice.status.$model"
                        :label="$t('form.status')"
                        :options="[
                            { label: $t('status.draft'), value: 'draft' },
                            { label: $t('status.sent'), value: 'sent' },
                            { label: $t('status.paid'), value: 'paid' },
                            { label: $t('status.cancelled'), value: 'cancelled' },
                            { label: $t('status.partial'), value: 'partial' },
                            { label: $t('status.overdue'), value: 'overdue' },
                            { label: $t('status.refunded'), value: 'refunded' },
                            { label: $t('status.unpaid'), value: 'unpaid' },
                        ]"
                        :validate="v$.invoice.status"
                    />
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
                    <SelectInput
                        id="customer_input"
                        v-model="invoice.customer_id"
                        :label="$t('form.customer')"
                        :options="partners"
                        filter
                        show-clear
                        option-value="id"
                        option-label="name"
                    />

                    <SelectInput
                        id="payer_input"
                        v-model="invoice.payer_id"
                        :label="$t('form.payer')"
                        filter
                        show-clear
                        :options="partners"
                        option-value="id"
                        option-label="name"
                    />
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
                    <SelectInput
                        v-model="invoice.customer_address_id"
                        :label="$t('form.customer_address')"
                        :options="customerAddresses"
                        data-key="id"
                        option-label="addressText"
                        option-value="id"
                        :disabled="!invoice.customer_id"
                    />

                    <SelectInput
                        v-model="invoice.payer_address_id"
                        :label="$t('form.payer_address')"
                        :options="payerAddresses"
                        data-key="id"
                        option-label="addressText"
                        option-value="id"
                        :disabled="!invoice.payer_id"
                    />
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-2">
                    <DateInput id="date_input" v-model="v$.invoice.date.$model" :label="$t('form.date')" :validate="v$.invoice.date" />
                    <DateInput
                        id="due_date_input"
                        v-model="v$.invoice.due_date.$model"
                        :label="$t('form.due_date')"
                        :validate="v$.invoice.due_date"
                    />
                    <SelectInput
                        id="currency_input"
                        v-model="v$.invoice.currency.$model"
                        :label="$t('form.currency')"
                        :options="currencies"
                        option-value="code"
                        option-label="name"
                        :validate="v$.invoice.currency"
                    />
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
                    <SelectInput
                        id="sales_person_input"
                        v-model="invoice.sales_person_id"
                        :label="$t('form.sales_person')"
                        :options="employees"
                        option-value="id"
                        filter
                        show-clear
                        option-label="label"
                    />
                    <SelectInput
                        id="payment_method_input"
                        v-model="v$.invoice.payment_method_id.$model"
                        :label="$t('form.payment_method')"
                        :options="paymentMethods"
                        option-value="id"
                        option-label="name"
                        :show-clear="true"
                        filter
                        :validate="v$.invoice.payment_method_id"
                    />
                </div>

                <div id="item_section" class="grid">
                    <div class="my-2">
                        <Button id="add_item_button" :label="$t('basic.add_item')" icon="fa fa-plus" @click="addItem" />
                    </div>
                    <DataTable class="overflow-x-auto" :value="invoice.items">
                        <template #empty>
                            <div class="p-4 pl-0 text-center">{{ $t('invoice.no_items') }}</div>