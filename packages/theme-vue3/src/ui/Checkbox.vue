<template>
    <base-checkbox v-bind="$attrs" />
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import { Checkbox as BaseCheckbox } from '@litstackjs/litstack-vue3';

export default defineComponent({
    components: { BaseCheckbox },
});
</script>
