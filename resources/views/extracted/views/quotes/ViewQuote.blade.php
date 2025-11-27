{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout>
        <LoadingScreen :blocked="loadingData">
            <PageHeader :title="quote.number">
                <template #actions>
                    <Button
                        v-if="quote.status != 'accepted' && quote.status != 'converted'"
                        id="edit_quote_button"
                        :label="$t('basic.edit')"
                        icon="fa fa-pen"
                        severity="success"
                        @click="$router.push(`/quotes/${quote.id}/edit`)"
                    />
                    <Button
                        v-if="quote.status != 'accepted' && quote.status != 'converted'"
                        id="delete_quote_button"
                        :label="$t('basic.delete')"
                        icon="fa fa-trash"
                        severity="danger"
                        @click="deleteQuoteAsk(quote.id)"
                    />
                    <Button
                        v-if="quote.status != 'converted' && quote.status != 'paid'"
                        id="convert_quote_to_invoice_button"
                        :label="$t('quote.convert_to_invoice')"
                        icon="fa fa-file-invoice-dollar"
                        severity="success"
                        @click="convertQuoteToInvoice(quote.id)"
                    />
                    <SplitButton
                        id="quote_actions"
                        :label="$t('basic.share')"
                        icon="fa fa-share"
                        @click="shareQuote($route.params.id)"
                        :model="[
                            { label: $t('basic.send'), icon: 'fa fa-paper-plane', command: () => sendQuoteNotification(quote.id) },
                            { label: $t('basic.download'), icon: 'fa fa-download', command: () => downloadQuote() },
                            { label: $t('basic.show_pdf'), icon: 'fa fa-file-pdf', command: () => viewQuotePdf() },
                            { label: $t('audit_log.audit_log'), icon: 'fa fa-history', command: () => (showAuditLogDialog = true) },
                        ]"
                    />