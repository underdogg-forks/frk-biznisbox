{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout>
        <LoadingScreen :blocked="loadingData">
            <PageHeader :title="$t('contract.create_contract')" />

            <div class="card">
                <form>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <TextInput v-model="v$.contract.number.$model" :label="$t('form.number')" :validate="v$.contract.number" disabled />
                        <SelectInput
                            v-model="v$.contract.status.$model"
                            :label="$t('form.status')"
                            :options="[
                                { label: $t('status.draft'), value: 'draft' },
                                { label: $t('status.waiting_signers'), value: 'waiting_signers' },
                                { label: $t('status.signed'), value: 'signed' },
                                { label: $t('status.rejected'), value: 'rejected' },
                                { label: $t('status.cancelled'), value: 'cancelled' },
                                { label: $t('status.expired'), value: 'expired' },
                            ]"
                            :validate="v$.contract.status"
                        />
                    </div>

                    <div>
                        <TextInput v-model="v$.contract.title.$model" :label="$t('form.title')" :validate="v$.contract.title" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <SelectInput
                            v-model="contract.partner_id"
                            :label="$t('form.partner')"
                            :options="partners"
                            option-value="id"
                            option-label="name"
                            filter
                            showClear
                        />
                        <SelectInput
                            v-model="contract.category_id"
                            :label="$t('form.contract_type')"
                            filter
                            :options="contractTypes"
                            option-value="id"
                            option-label="name"
                            showClear
                        />

                        <SelectInput
                            v-model="contract.type"
                            :label="$t('form.type_of_contract_sign')"
                            :options="[
                                { value: 'electronic', label: $t('contract_sign_types.electronic') },
                                { value: 'digital_signature', label: $t('contract_sign_types.digital_signature') },
                                { value: 'paper', label: $t('contract_sign_types.paper') },
                            ]"
                        />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <DateInput v-model="contract.start_date" :label="$t('form.date')" />
                        <DateInput v-model="contract.end_date" :label="$t('form.end_date')" />
                        <DateInput v-model="contract.date_for_signature" :label="$t('form.date_for_signature')" />
                    </div>

                    <div id="signers_table" class="overflow-x-auto">
                        <div class="py-2">
                            <Button :label="$t('basic.add_signer')" icon="fa fa-plus" @click="addSigner" />
                        </div>
                        <DataTable class="overflow-x-auto" :value="contract.signers" @row-reorder="reorderSigners">
                            <template #empty>
                                <div class="p-4 pl-0 text-center">{{ $t('contract.no_signers') }}</div>