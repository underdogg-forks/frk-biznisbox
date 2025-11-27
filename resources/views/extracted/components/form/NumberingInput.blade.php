{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<Button :label="$t('basic.add')" icon="fa fa-plus" @click="addNumbering" class="mt-2" />
    <div v-for="(format, index) in modelValue" :key="index">
        <div :id="`modelValue_${index}`" class="flex gap-2 py-2">
            <Button icon="fa fa-arrows" severity="secondary" @click="moveNumbering(index, 'up')" class="cursor-pointer" />
            <SelectInput
                v-model="format.type"
                :options="[
                    { label: $t('form.text'), value: 'TEXT' },
                    { label: $t('form.number'), value: 'NUMBER' },
                    { label: $t('form.delimiter'), value: 'DELIMITER' },
                    { label: $t('form.date'), value: 'DATE' },
                ]"
            />
            <TextInput v-if="format.type !== 'DELIMITER'" v-model="format.value" />
            <Button icon="fa fa-trash" severity="danger" @click="deleteNumbering(index)" />
        </div>

        <div v-if="index === modelValue.length - 1">
            <label>{{ $t('basic.preview') }}</label>
            <TextInput v-model="previewText" aria-disabled="true" disabled />
        </div>
    </div>