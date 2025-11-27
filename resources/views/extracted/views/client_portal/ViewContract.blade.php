{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout menu_type="client">
        <LoadingScreen :loading="loadingData">
            <PageHeader :title="contract.title">
                <template #actions>
                    <Button
                        id="download_button"
                        :label="$t('basic.download')"
                        icon="fa fa-download"
                        severity="secondary"
                        @click="downloadContractPdf"
                    />