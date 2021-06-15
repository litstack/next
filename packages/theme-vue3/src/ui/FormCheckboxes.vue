<template>
    <div>
        <h5>{{ title }}</h5>
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
