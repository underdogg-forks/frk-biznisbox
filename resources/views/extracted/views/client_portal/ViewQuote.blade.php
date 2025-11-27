{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout menu_type="client">
        <LoadingScreen :blocked="loadingData">
            <PageHeader :title="quote.number">
                <template #actions>
                    <Button
                        id="download_button"
                        :label="$t('basic.download')"
                        icon="fa fa-download"
                        severity="secondary"
                        @click="downloadQuote"
                    />

                    <div
                        v-if="
                            quote.status !== 'accepted' &&
                            quote.status !== 'rejected' &&
                            quote.status !== 'expired' &&
                            quote.status !== 'cancelled'
                        "
                    >
                        <Button
                            id="accept_button"
                            :label="$t('basic.accept')"
                            icon="fa fa-check"
                            severity="success"
                            @click="acceptRejectQuote('accept')"
                        />

                        <Button
                            id="reject_button"
                            :label="$t('basic.reject')"
                            icon="fa fa-times"
                            severity="danger"
                            @click="acceptRejectQuote('reject')"
                        />
                    </div>