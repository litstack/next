<template>
    <base-form v-bind="$attrs" :form="form" />
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import { Form as BaseForm, useForm } from '@litstackjs/litstack-vue3';
import { UseFormAttrs } from '@litstackjs/litstack';

export default defineComponent({
    components: { BaseForm },
    setup(props, { attrs }) {
        const form = useForm(<UseFormAttrs>attrs);

        return { form };
    },
});
</script>
