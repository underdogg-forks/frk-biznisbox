{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout>
        <LoadingScreen :blocked="loadingData">
            <PageHeader :title="$t('partner.new_partner')" />
            <div class="card">
                <form>
                    <div class="grid lg:grid-cols-2 grid-cols-1 gap-2">
                        <TextInput
                            id="number_input"
                            v-model="v$.partner.number.$model"
                            disabled
                            :label="$t('form.number')"
                            :validate="v$.partner.number"
                        />
                        <TextInput id="name_input" v-model="v$.partner.name.$model" :label="$t('form.name')" :validate="v$.partner.name" />
                    </div>

                    <div class="grid lg:grid-cols-2 grid-cols-1 gap-2">
                        <SelectButtonInput
                            id="select_partner_entity_type"
                            v-model="v$.partner.entity_type.$model"
                            :label="$t('form.entity_type')"
                            :options="[
                                { label: $t('entity_types.individual'), value: 'individual' },
                                { label: $t('entity_types.company'), value: 'company' },
                            ]"
                            :validate="v$.partner.entity_type"
                        />

                        <SelectButtonInput
                            id="select_partner_type"
                            v-model="v$.partner.type.$model"
                            :label="$t('form.partner_type')"
                            :options="[
                                { label: $t('partner_types.customer'), value: 'customer' },
                                { label: $t('partner_types.supplier'), value: 'supplier' },
                                { label: $t('partner_types.both'), value: 'both' },
                                { label: $t('basic.other'), value: 'other' },
                            ]"
                            :validate="v$.partner.type"
                        />
                    </div>

                    <div class="grid lg:grid-cols-2 grid-cols-1 gap-2">
                        <SelectInput
                            id="select_partner_currency"
                            v-model="v$.partner.currency.$model"
                            :options="currencies"
                            :label="$t('form.currency')"
                            option-value="code"
                            option-label="name"
                            :validate="v$.partner.currency"
                        />
                        <SelectInput
                            id="select_partner_size"
                            v-model="partner.size"
                            :options="[
                                { label: $t('basic.micro'), value: 'micro' },
                                { label: $t('basic.small'), value: 'small' },
                                { label: $t('basic.medium'), value: 'medium' },
                                { label: $t('basic.large'), value: 'large' },
                            ]"
                            :label="$t('form.size')"
                            show-clear
                        />
                    </div>
                    <div class="grid lg:grid-cols-2 grid-cols-1 gap-2">
                        <TextInput id="partner_website_input" v-model="partner.website" :label="$t('form.website')" />

                        <SelectInput
                            id="select_partner_language"
                            v-model="v$.partner.language.$model"
                            :options="locales"
                            :label="$t('form.language')"
                            option-value="code"
                            option-label="locale"
                            :validate="v$.partner.language"
                        />
                    </div>
                    <div class="grid lg:grid-cols-2 grid-cols-1 gap-2">
                        <div class="grid grid-cols-1 gap-2">
                            <div class="flex items-end gap-2 content-center">
                                <TextInput
                                    id="vat_number_input"
                                    v-model="partner.vat_number"
                                    :label="$t('form.vat_number')"
                                    class="flex-1"
                                />
                                <Button
                                    v-if="partner.entity_type == 'company'"
                                    label="Validate VAT"
                                    @click="validateVatId"
                                    class="whitespace-nowrap mb-2"
                                />
                            </div>
                            <div v-if="vatValidationError" class="text-red-500 text-sm">
                                {{ vatValidationError }}
                            </div>
                        </div>

                        <!-- Industry select -->
                        <SelectInput
                            id="select_partner_industry"
                            v-model="partner.industry"
                            :options="industries"
                            :label="$t('form.industry')"
                            option-value="value"
                            option-label="name"
                            show-clear
                        />
                    </div>
                    <div id="addresses_table_section" class="grid">
                        <div class="my-2">
                            <Button :label="$t('partner.add_address')" icon="fa fa-plus" @click="addAddress" />
                        </div>
                        <DataTable id="addresses_table" :value="partner.addresses" class="overflow-auto">
                            <template #empty>
                                <div class="p-4 pl-0 text-center">{{ $t('partner.no_addresses') }}</div>