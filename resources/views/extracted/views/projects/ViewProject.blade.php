{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout>
        <PageHeader :title="project.name || $t('project.project')">
            <template v-slot:actions>
                <Button :label="$t('project.edit_project')" icon="fa fa-edit" @click="openEditProjectDialog" severity="success" />
                <Button :label="$t('project.add_task')" icon="fa fa-plus" @click="openNewTaskDialog" />
                <Button :label="$t('project.project_members')" icon="fa fa-users" @click="showProjectMembersDialog = true" />