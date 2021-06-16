<template>
    <base-form v-bind="$attrs" />
</template>

<script>
import { defineComponent } from 'vue';
import { Form as BaseForm } from '@litstackjs/litstack-vue3';

export default defineComponent({
    components: { BaseForm },
});
</script>
