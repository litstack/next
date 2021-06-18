<template>
    <div>
        <field-title v-bind="$attrs" />
        <form-textarea v-bind="$attrs" />
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import { FormTextarea, FieldTitle } from '@litstackjs/litstack-vue3';

export default defineComponent({
    components: { FormTextarea, FieldTitle },
});
</script>
