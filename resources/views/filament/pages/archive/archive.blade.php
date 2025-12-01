<x-filament-panels::page>
{{--
    Converted from Vue: Archive.vue
    
    CONVERSION NOTES:
    - All Vue directives (v-if, v-for, @click, :prop, etc.) have been removed
    - Vue components have been commented out - replace with Filament/Blade equivalents
    - {{ }} expressions are preserved but may reference Vue data - update as needed
    - Translation calls $t() have been converted to __()
    - This file requires significant manual work to become functional
--}}


    {{-- DefaultLayout removed: Using Filament page structure --}}
        {{-- PageHeader removed: Use Filament page header configuration --}}

        <div class="card">
            <div id="documents" class="grid grid-cols-1 md:grid-cols-12 gap-4">
                <div id="folder_tree_section" class="col-span-1 md:col-span-4">
                    <!-- Folders tree -->
                    <Tree
                        id="folder_tree"
                        filter
                        filter-mode="strict"
                        selection-mode="single"
                    >
                        {{-- Vue slot removed --}}
                            <div class="flex items-center">
                                <span class="fiv-viv fiv-icon-folder icon-file"></span>
                                <span class="fa fa-trash icon-file"></span>
                                <span class="ml-2">{{ node.label }}</span>
                            </div>
                        {{-- End Vue slot --}}
                    </Tree>
                </div>

                <div id="files_section" class="col-span-1 md:col-span-8">
                    {{-- Start DataTable --}}
                        {{-- Vue slot removed --}}
                            <div class="p-4 pl-0 text-center w-full dark:text-gray-400">
                                <div>
                                    <i class="fa fa-info-circle empty-icon"></i>
                                    <p>{{ __('archive.no_documents') }}</p>
                                    {{-- Button (self-closing) --}}
                                </div>

                                <div>
                                    <i class="fa fa-info-circle empty-icon"></i>
                                    <p>{{ __('archive.no_documents_in_trash') }}</p>
                                </div>
                            </div>
                        {{-- End Vue slot --}}
                        {{-- Column (self-closing) --}}
                        {{-- Start Column --}}
                            {{-- Vue slot removed --}}
                                <div class="flex items-center">
                                    <span></span>
                                    <span class="ml-2">{{ data.name }}</span>
                                </div>
                            {{-- End Vue slot --}}
                        {{-- End Column --}}
                        {{-- Start Column --}}
                            {{-- Vue slot removed --}}
                                <span>{{ formatDateTime(data.created_at) }}</span>
                            {{-- End Vue slot --}}
                        {{-- End Column --}}
                        {{-- Start Column --}}
                            {{-- Vue slot removed --}}
                                <span>{{ formatFileSize(data.file_size) }}</span>
                            {{-- End Vue slot --}}
                        {{-- End Column --}}

                        {{-- Start Column --}}
                            {{-- Vue slot removed --}}
                                {{-- Start Tag --}}{{
                                    __(`status.${data.status}`)
                                }}{{-- End Tag --}}
                                {{-- Start Tag --}}{{ __(`status.${data.status}`) }}{{-- End Tag --}}
                            {{-- End Vue slot --}}
                        {{-- End Column --}}
                    {{-- End DataTable --}}
                </div>
            </div>
        </div>

        <!-- New/Update folder dialog -->
        {{-- Start Dialog --}}
            {{-- TextInput (self-closing) --}}
            {{-- Vue slot removed --}}
                <div id="function_buttons" class="flex gap-2 justify-end flex-wrap">
                    {{-- Button (self-closing) --}}
                    {{-- Button (self-closing) --}}

                    {{-- Button (self-closing) --}}
                </div>
            {{-- End Vue slot --}}
        {{-- End Dialog --}}

        <!-- New document dialog -->
        {{-- Start Dialog --}}
            {{-- TextInput (self-closing) --}}
            {{-- TextInput (self-closing) --}}
            {{-- SelectInput (self-closing) --}}

            <div id="upload_document_section" class="mt-4">
                {{-- FileUpload (self-closing) --}}
            </div>

            {{-- SelectInput (self-closing) --}}

            {{-- SelectInput (self-closing) --}}

            {{-- Vue slot removed --}}
                <div id="function_buttons" class="flex gap-2 justify-content-end">
                    {{-- Button (self-closing) --}}
                    {{-- Button (self-closing) --}}
                </div>
            {{-- End Vue slot --}}
        {{-- End Dialog --}}

        <!-- Pdf view dialog-->
        {{-- Start Dialog --}}
            <div>
                <PdfViewer style="height: 100vh" :fileName="fileViewerTitle" />
            </div>

            <div>
                <img alt="preview" style="width: 100%" />
            </div>
        {{-- End Dialog --}}

        <!-- Document move dialog -->
        {{-- Start Dialog --}}
            <TreeSelectInput
                id="move_folder"
                option-label="label"
                option-value="id"
                show-clear
                filter
                placeholder="Select a folder"
            />
            {{-- Vue slot removed --}}
                <div id="function_buttons" class="flex gap-2 justify-content-end">
                    {{-- Button (self-closing) --}}
                    {{-- Button (self-closing) --}}
                </div>
            {{-- End Vue slot --}}
        {{-- End Dialog --}}

        <!-- Sidebar for file -->
        <!-- prettier-ignore-attribute -->
        <Drawer
            id="document_sidebar"
            position="right"
        >
            {{-- LoadingScreen removed --}}
                <span
                    id="document_name"
                    class="font-bold text-x"
                    style="word-wrap: break-word"
                    >{{ document.name }}</span
                >
                <div class="flex gap-2">
                    <InputText id="document_name" class="mt-2 w-full" />
                </div>

                <div class="mt-2 flex gap-2">
                    {{-- Button (self-closing) --}}
                    {{-- Button (self-closing) --}}
                </div>

                <div class="mt-2">
                    <span class="text-x" style="word-wrap: break-word">{{
                        document.description
                    }}</span>
                    <Textarea class="mt-2 w-full" />
                </div>

                <div class="mt-4">
                    {{-- DisplayData (self-closing) --}}
                    {{-- DisplayData (self-closing) --}}
                    {{-- DisplayData (self-closing) --}}
                </div>

                <div class="mt-4">
                    {{-- Start DisplayData --}}
                        {{-- Start Tag --}}{{
                            __(`status.${document.status}`)
                        }}{{-- End Tag --}}
                        {{-- Start Tag --}}{{ __(`status.${document.status}`) }}{{-- End Tag --}}
                    {{-- End DisplayData --}}

                    {{-- DisplayData (self-closing) --}}
                    {{-- DisplayData (self-closing) --}}
                    {{-- DisplayData (self-closing) --}}
                    {{-- DisplayData (self-closing) --}}

                    {{-- Start DisplayData --}}
                        {{-- Tag (self-closing) --}}
                    {{-- End DisplayData --}}

                    <div class="mt-2">
                        {{-- SelectInput (self-closing) --}}

                        {{-- SelectInput (self-closing) --}}

                        <div class="mt-2">
                            {{-- SelectInput (self-closing) --}}

                            {{-- SelectInput (self-closing) --}}

                            {{-- SelectInput (self-closing) --}}

                            {{-- SelectInput (self-closing) --}}
                        </div>
                    </div>
                </div>

                <div id="functions_buttons" class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-4">
                    {{-- Button (self-closing) --}}
                    {{-- Button (self-closing) --}}
                    {{-- Button (self-closing) --}}
                    {{-- Button (self-closing) --}}
                </div>
            
        </Drawer>

        <!--Audit log dialog -->
        {{-- Start Dialog --}}
            {{-- AuditLog (self-closing) --}}
        {{-- End Dialog --}}
    

</x-filament-panels::page>
