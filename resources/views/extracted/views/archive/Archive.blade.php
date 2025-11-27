{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout>
        <PageHeader :title="$t('archive.archive')">
            <template #actions>
                <Button
                    v-if="currentFolder != 'trash'"
                    id="new_document_button"
                    :label="$t('archive.new_document')"
                    icon="fa fa-file"
                    @click="openNewDocumentDialog"
                />
                <Button
                    v-if="currentFolder !== 'trash'"
                    id="new_folder_button"
                    :label="$t('archive.new_folder')"
                    icon="fa fa-folder-plus"
                    @click="openNewFolderDialog"
                />
                <Button
                    v-if="currentFolder != null && currentFolder !== 'trash'"
                    id="edit_folder_button"
                    :label="$t('archive.edit_folder')"
                    icon="fa fa-folder-open"
                    @click="openEditFolderDialog"
                />