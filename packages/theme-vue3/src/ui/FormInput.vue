<template>
    <div>
        <base-field-title v-bind="$attrs" />
        <base-form-input v-bind="$attrs" />
    </div>
</template>

<script>
import { FormInput } from '@litstackjs/litstack-vue3';

export default FormInput;
</script>
