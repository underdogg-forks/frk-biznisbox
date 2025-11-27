{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout>
        <LoadingScreen :blocked="loadingData">
            <PageHeader :title="contract.title">
                <template #actions>
                    <Button
                        v-if="contract.status !== 'signed' && contract.status !== 'rejected' && contract.status !== 'cancelled'"
                        id="edit_button"
                        :label="$t('basic.edit')"
                        severity="success"
                        icon="fa fa-edit"
                        @click="$router.push(`/contracts/${contract.id}/edit`)"
                    />
                    <Button
                        v-if="contract.status !== 'signed' && contract.status !== 'rejected' && contract.status !== 'cancelled'"
                        id="delete_button"
                        :label="$t('basic.delete')"
                        icon="fa fa-trash"
                        severity="danger"
                        @click="deleteContractAsk($route.params.id)"
                    />

                    <SplitButton
                        id="more_options_button"
                        icon="fa fa-list"
                        :model="[
                            { label: $t('basic.download'), icon: 'fa fa-download', command: downloadContractPdf },
                            { label: $t('basic.show_pdf'), icon: 'fa fa-file-pdf', command: viewContractPdf },
                            {
                                label: $t('basic.audit_log'),
                                icon: 'fa fa-history',
                                command: () => (showAuditLogDialog = true),
                            },
                            {
                                label: $t('basic.share'),
                                icon: 'fa fa-share',
                                command: () => {
                                    shareContract(contract.id)
                                },
                            },
                        ]"
                    />