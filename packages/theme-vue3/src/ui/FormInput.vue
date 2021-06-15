<template>
    <div>
        <h5>{{ title }}</h5>
        <base-form-input v-bind="$attrs" />
    </div>
</template>

<script>
import { FormInput } from '@litstackjs/litstack-vue3';

FormInput.props = {
    title: {
        type: String,
        required: true,
    },
};

export default FormInput;
</script>
