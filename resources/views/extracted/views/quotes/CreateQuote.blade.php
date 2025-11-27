{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout>
        <LoadingScreen :blocked="loadingData">
            <PageHeader :title="$t('quote.new_quote')" />

            <div class="card">
                <form>
                    <div class="grid lg:grid-cols-2 grid-cols-1 gap-2">
                        <TextInput
                            id="number_input"
                            v-model="v$.quote.number.$model"
                            disabled
                            :label="$t('form.number')"
                            :validate="v$.quote.number"
                        />
                        <SelectInput
                            id="status_input"
                            v-model="v$.quote.status.$model"
                            :label="$t('form.status')"
                            :options="[
                                { label: $t('status.draft'), value: 'draft' },
                                { label: $t('status.sent'), value: 'sent' },
                                { label: $t('status.viewed'), value: 'viewed' },
                                { label: $t('status.accepted'), value: 'accepted' },
                                { label: $t('status.cancelled'), value: 'cancelled' },
                                { label: $t('status.rejected'), value: 'rejected' },
                                { label: $t('status.converted'), value: 'converted' },
                                { label: $t('status.expired'), value: 'expired' },
                            ]"
                            :validate="v$.quote.status"
                        />
                    </div>

                    <div class="grid lg:grid-cols-2 grid-cols-1 gap-2">
                        <SelectInput
                            id="customer_input"
                            v-model="quote.customer_id"
                            :label="$t('form.customer')"
                            :options="partners"
                            filter
                            show-clear
                            option-value="id"
                            option-label="name"
                        />

                        <SelectInput
                            id="payer_input"
                            v-model="quote.payer_id"
                            :label="$t('form.payer')"
                            filter
                            show-clear
                            :options="partners"
                            option-value="id"
                            option-label="name"
                        />
                    </div>

                    <div class="grid lg:grid-cols-2 grid-cols-1 gap-2">
                        <SelectInput
                            v-model="quote.customer_address_id"
                            :label="$t('form.customer_address')"
                            :options="customerAddresses"
                            data-key="id"
                            option-label="addressText"
                            option-value="id"
                            :disabled="!quote.customer_id"
                        />

                        <SelectInput
                            v-model="quote.payer_address_id"
                            :label="$t('form.payer_address')"
                            :options="payerAddresses"
                            data-key="id"
                            option-label="addressText"
                            option-value="id"
                            :disabled="!quote.payer_id"
                        />
                    </div>

                    <div class="grid lg:grid-cols-3 grid-cols-1 gap-2">
                        <DateInput id="date_input" :label="$t('form.date')" v-model="v$.quote.date.$model" :validate="v$.quote.date" />
                        <DateInput
                            id="valid_until_input"
                            v-model="v$.quote.valid_until.$model"
                            :label="$t('form.valid_until')"
                            :validate="v$.quote.valid_until"
                        />
                        <SelectInput
                            id="currency_input"
                            v-model="v$.quote.currency.$model"
                            :label="$t('form.currency')"
                            :options="currencies"
                            option-value="code"
                            option-label="name"
                            :validate="v$.quote.currency"
                        />
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
                        <SelectInput
                            id="sales_person_input"
                            v-model="quote.sales_person_id"
                            :label="$t('form.sales_person')"
                            :options="employees"
                            option-value="id"
                            option-label="label"
                        />
                        <SelectInput
                            id="payment_method_input"
                            v-model="v$.quote.payment_method_id.$model"
                            :label="$t('form.payment_method')"
                            :options="paymentMethods"
                            option-value="id"
                            option-label="name"
                            :validate="v$.quote.payment_method_id"
                        />
                    </div>

                    <div id="item_section" class="grid">
                        <div class="my-2">
                            <Button id="add_item_button" :label="$t('basic.add_item')" icon="fa fa-plus" @click="addItem" />
                        </div>
                        <DataTable class="overflow-x-auto" :value="quote.items">
                            <template #empty>
                                <div class="p-4 pl-0 text-center">{{ $t('quote.no_items') }}</div>