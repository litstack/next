<template>
    <div>
        <h5>{{ title }}</h5>
        <base-form-textarea v-bind="$attrs" />
    </div>
</template>

<script>
import { FormTextarea } from '@litstackjs/litstack-vue3';

FormTextarea.props = {
    title: {
        type: String,
        required: true,
    },
};

export default FormTextarea;
</script>
