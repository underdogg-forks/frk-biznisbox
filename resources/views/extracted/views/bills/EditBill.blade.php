{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout>
        <LoadingScreen :blocked="loadingData">
            <PageHeader :title="$t('bill.edit_bill')" />

            <div class="card">
                <form>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <TextInput v-model="v$.bill.number.$model" :label="$t('form.number')" :validate="v$.bill.number" disabled />
                        <SelectInput
                            v-model="v$.bill.status.$model"
                            :label="$t('form.status')"
                            :options="[
                                { label: $t('status.draft'), value: 'draft' },
                                { label: $t('status.paid'), value: 'paid' },
                                { label: $t('status.unpaid'), value: 'unpaid' },
                                { label: $t('status.overdue'), value: 'overdue' },
                                { label: $t('status.cancelled'), value: 'cancelled' },
                            ]"
                            :validate="v$.bill.status"
                        />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <DateInput v-model="v$.bill.date.$model" :label="$t('form.date')" :validate="v$.bill.date" />
                        <DateInput v-model="v$.bill.due_date.$model" :label="$t('form.due_date')" :validate="v$.bill.due_date" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <SelectInput
                            v-model="bill.supplier_id"
                            :label="$t('form.supplier')"
                            :options="suppliers"
                            data-key="id"
                            filter
                            show-clear
                            option-label="name"
                            option-value="id"
                        />

                        <SelectInput
                            v-model="bill.supplier_address_id"
                            :label="$t('form.supplier_address')"
                            :options="supplierAddresses"
                            data-key="id"
                            option-label="addressText"
                            option-value="id"
                        />
                    </div>
                    <div id="items_table" class="grid">
                        <div class="py-2">
                            <Button :label="$t('basic.add_item')" icon="fa fa-plus" @click="addItem" />
                        </div>
                        <DataTable class="overflow-x-auto" :value="bill.items">
                            <template #empty>
                                <div class="p-4 pl-0 text-center">{{ $t('bill.no_items') }}</div>