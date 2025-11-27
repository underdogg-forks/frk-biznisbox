{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout>
        <LoadingScreen :blocked="loadingData">
            <PageHeader :title="product.name">
                <template v-slot:actions>
                    <Button
                        :label="$t('basic.edit')"
                        @click="$router.push(`/products/${product.id}/edit`)"
                        severity="success"
                        id="edit_product_button"
                        icon="fa fa-pencil"
                    />
                    <Button
                        :label="$t('basic.delete')"
                        @click="deleteProductAsk($route.params.id)"
                        severity="danger"
                        id="delete_product_button"
                        icon="fa fa-trash"
                    />
                    <Button
                        :label="$t('audit_log.audit_log')"
                        @click="showAuditLogDialog = true"
                        severity="info"
                        id="audit_log_button"
                        icon="fa fa-history"
                    />