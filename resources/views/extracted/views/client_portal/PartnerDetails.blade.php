{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout menu_type="client">
        <LoadingScreen :blocked="loadingData">
            <PageHeader :title="partner ? partner.name : $t('client_portal.partner_details')" />

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-3">
                <div class="grid grid-cols-1 lg:col-span-4">
                    <div class="card">
                        <div class="font-bold mb-4">
                            <h3>{{ $t('partner.partner_details') }}</h3>
                        </div>
                        <DisplayData :input="$t('form.number')" :value="partner.number" />
                        <DisplayData :input="$t('form.name')" :value="partner.name" />
                        <div class="grid md:grid-cols-2 gap-2">
                            <div>
                                <Tag v-if="partner.type === 'customer'" :value="$t('partner_types.customer')" />
                                <Tag v-if="partner.type === 'supplier'" :value="$t('partner_types.supplier')" />
                                <Tag v-if="partner.type === 'both'" :value="$t('partner_types.both')" />
                                <Tag v-if="partner.type === 'other'" :value="$t('basic.other')" />
                            </div>
                            <div>
                                <Tag v-if="partner.entity_type == 'company'" :value="$t('entity_types.company')" />
                                <Tag v-if="partner.entity_type == 'individual'" :value="$t('entity_types.individual')" />
                            </div>
                        </div>
                        <DisplayData :input="$t('form.vat_number')" :value="partner.vat_number" />
                        <DisplayData v-if="partner.website" :input="$t('form.website')" :value="partner.website" is-link />
                        <DisplayData v-if="partner.language" :input="$t('form.language')" :value="$t('language.' + partner.language)" />
                        <DisplayData v-if="partner.currency" :input="$t('form.currency')" :value="partner.currency" />
                        <DisplayData v-if="partner.size" :input="$t('form.size')" :value="$t('basic.' + partner.size)" />
                        <DisplayData v-if="partner.industry" :input="$t('form.industry')" :value="$t(`industries.${partner.industry}`)" />
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:col-span-8">
                    <div class="card">
                        <Tabs value="contact_information" scrollable>
                            <TabList>
                                <Tab value="contact_information">{{ $t('partner.contact_information') }}</Tab>
                                <Tab value="addresses">{{ $t('partner.addresses') }}</Tab>
                            </TabList>

                            <TabPanels>
                                <!-- Contacts table -->
                                <TabPanel value="contact_information">
                                    <DataTable id="contacts_table" :value="partner.contacts">
                                        <template #empty>
                                            <div class="p-4 pl-0 text-center w-full dark:text-gray-400">
                                                <i class="fa fa-info-circle empty-icon"></i>
                                                <p>{{ $t('partner.no_contacts') }}</p>
                                            </div>