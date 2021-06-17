<template>
    <div>
        <field-title v-bind="$attrs" />
        <div>
            <form-checkboxes v-bind="$attrs" />
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import { FormCheckboxes, FieldTitle } from '@litstackjs/litstack-vue3';

export default defineComponent({
    components: {
        FormCheckboxes,
        FieldTitle,
    },
});
</script>
