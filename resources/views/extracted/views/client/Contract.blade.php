{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<div id="client_view_contract_page" class="p-2">
        <LoadingScreen :blocked="loadingData">
            <div>
                <div id="company_data" class="p-3">
                    <span class="font-bold">{{ formatText($settings.company_name) }}</span
                    ><br />
                    <span>{{ formatText($settings.company_address) }}</span> <br />
                    <span>{{ formatText($settings.company_zip) + ' ' + formatText($settings.company_city) }}</span> <br />
                    <span>{{ formatCountry($settings.company_country) }}</span> <br />
                    <span v-if="$settings.company_vat">{{ $t('form.tax_id') + ': ' + $settings.company_vat }}</span>
                </div>

                <div v-if="!no_found" class="card m-2">
                    <PageHeader :title="contract.title">
                        <template #actions>
                            <Button
                                id="download_button"
                                v-tooltip:top="$t('basic.click_for_download')"
                                class="mr-2 no-print"
                                :disabled="!contract.download"
                                icon="fa fa-download"
                                @click="downloadContract"
                            />
                            <Button
                                v-if="contract.must_sign && !contract.is_signed"
                                class="no-print"
                                icon="fa fa-signature"
                                @click="openSignDialog"
                            />