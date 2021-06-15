<template>
    <div>
        <base-field-title v-bind="$attrs" />
        <div>
            <base-form-checkboxes v-bind="$attrs" />
        </div>
    </div>
</template>

<script>
import { FormCheckboxes } from '@litstackjs/litstack-vue3';

FormCheckboxes.props = {
    title: {
        type: String,
        required: true,
    },
};

export default FormCheckboxes;
</script>
