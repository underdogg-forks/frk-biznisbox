{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout>
        <LoadingScreen :blocked="loadingData">
            <PageHeader :title="payment.number">
                <template #actions>
                    <Button :label="$t('audit_log.audit_log')" icon="fa fa-history" severity="info" @click="showAuditLogDialog = true" />
                    <Button
                        v-if="payment.payment_method == 'stripe' && payment.status == 'paid'"
                        :label="$t('form.refund')"
                        icon="fa fa-undo"
                        severity="info"
                        @click="makePaymentRefund"
                    />