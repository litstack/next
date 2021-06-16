<template>
    <div>
        <base-field-title v-bind="$attrs" />
        <base-form-textarea v-bind="$attrs" />
    </div>
</template>

<script>
import { FormTextarea } from '@litstackjs/litstack-vue3';

export default FormTextarea;
</script>
