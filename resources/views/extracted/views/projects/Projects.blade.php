{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout>
        <PageHeader :title="$t('project.project', 3)">
            <template v-slot:actions>
                <Button :label="$t('project.new_project')" icon="fa fa-plus" @click="openCreateProjectDialog" />