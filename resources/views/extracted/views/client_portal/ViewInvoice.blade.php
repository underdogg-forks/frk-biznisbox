{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout menu_type="client">
        <LoadingScreen :blocked="loadingData">
            <PageHeader :title="invoice.number">
                <template #actions>
                    <Button
                        v-if="invoice.download"
                        :label="$t('basic.download')"
                        icon="fa fa-download"
                        class="no-print"
                        @click="downloadFile(invoice.download)"
                    />
                    <Button
                        v-if="availablePaymentGateways.length > 0 && invoice.status != 'paid'"
                        id="select_payment_gateway_button"
                        v-tooltip:top="$t('invoice.click_for_pay')"
                        class="mr-2 no-print"
                        icon="fa fa-credit-card"
                        @click="availablePaymentGatewaysDialog = true"
                    />