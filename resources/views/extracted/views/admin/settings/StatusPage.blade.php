{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout menu_type="admin">
        <LoadingScreen :blocked="loadingData">
            <PageHeader :title="$t('admin.status.title')" />

            <Message severity="success" v-if="!version_info?.is_up_to_date">
                <div class="flex items-center justify-end">
                    <p>{{ $t('admin.status.new_version_available') }}</p>

                    <Button @click="showChangelogDialog" type="primary" icon class="ml-2 end-0">
                        <i class="fas fa-info-circle"></i>
                    </Button>
                </div>
            </Message>
            <div id="version_data_card" class="card">
                <DisplayData :value="version_info?.current_version" :input="$t('admin.status.app_version')" />

                <DisplayData :value="version_info?.latest_version" :input="$t('admin.status.latest_version')" />
            </div>

            <div id="storage_used_card" class="card mt-4">
                <DisplayData :value="status_info?.php_version" :input="$t('admin.status.php_version')" />

                <DisplayData :value="status_info?.server_software" :input="$t('admin.status.server_software')" />

                <DisplayData :value="status_info?.database_connection" :input="$t('admin.status.database_connection')" />

                <DisplayData :value="status_info?.database_version" :input="$t('admin.status.database_version')" />

                <DisplayData
                    :value="status_info?.storage_limit == -1 ? $t('admin.status.unlimited') : formatFileSize(status_info?.storage_limit)"
                    :input="$t('admin.status.storage_limit')"
                />

                <DisplayData :value="formatFileSize(status_info?.storage_used)" :input="$t('admin.status.storage_used')" />

                <DisplayData
                    v-if="status_info?.storage_limit != -1"
                    :value="formatFileSize(status_info?.storage_free)"
                    :input="$t('admin.status.storage_free')"
                />

                <DisplayData
                    v-if="status_info?.storage_limit != -1"
                    :value="status_info?.storage_usage_percentage + '%'"
                    :input="$t('admin.status.storage_usage_percentage')"
                />
            </div>
        </LoadingScreen>

        <!-- Changelog dialog -->
        <Dialog v-model:visible="showChangelog" @close="showChangelog = false" modal :header="$t('admin.status.changelog')">
            <div class="changelog" v-html="version_info?.changelog"></div>
        </Dialog>
    </DefaultLayout>