{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout>
        <LoadingScreen :blocked="loadingData">
            <PageHeader :title="`${bill.number}`">
                <template v-slot:actions>
                    <Button
                        :label="$t('basic.edit')"
                        @click="$router.push({ name: 'bill-edit', params: { id: bill.id } })"
                        icon="fa fa-pencil"
                        severity="success"
                    />
                    <Button :label="$t('basic.delete')" @click="deleteBillAsk($route.params.id)" icon="fa fa-trash" severity="danger" />
                    <SplitButton
                        id="more_options_button"
                        :label="$t('basic.show_pdf')"
                        icon="fa fa-list"
                        :model="[
                            { label: $t('basic.download'), icon: 'fa fa-download', command: downloadBillPdf },
                            { label: $t('basic.audit_log'), icon: 'fa fa-history', command: () => (showAuditLogDialog = true) },
                        ]"
                        @click="showBillPdf"
                    />