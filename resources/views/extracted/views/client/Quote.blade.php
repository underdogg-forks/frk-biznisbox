{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<LoadingScreen :blocked="loadingData">
        <div>
            <div id="company_data" class="mb-2 d-block p-3">
                <span class="font-bold">{{ formatText($settings.company_name) }}</span
                ><br />
                <span>{{ formatText($settings.company_address) }}</span> <br />
                <span>{{ formatText($settings.company_zip) + ' ' + formatText($settings.company_city) }}</span> <br />
                <span>{{ formatCountry($settings.company_country) }}</span> <br />
                <span v-if="$settings.company_vat">{{ $t('form.tax_id') + ': ' + $settings.company_vat }}</span>
            </div>

            <div v-if="!not_found" class="card m-2">
                <PageHeader :title="$t('quote.quote') + ' ' + quote.number">
                    <template #actions>
                        <Button class="mr-2 no-print" :disabled="!quote" icon="fa fa-download" @click="downloadQuote" />
                        <div
                            v-if="
                                quote.valid_until > new Date().toISOString() &&
                                quote.status !== 'accepted' &&
                                quote.status !== 'rejected' &&
                                quote.status !== 'converted'
                            "
                        >
                            <Button
                                class="mr-2 no-print"
                                severity="success"
                                :disabled="!quote"
                                icon="fa fa-check"
                                :label="$t('basic.accept')"
                                @click="acceptRejectQuote($route.params.id, 'accepted')"
                            />
                            <Button
                                class="mr-2 no-print"
                                :disabled="!quote"
                                severity="danger"
                                icon="fa fa-times"
                                :label="$t('basic.reject')"
                                @click="acceptRejectQuote($route.params.id, 'rejected')"
                            />
                        </div>