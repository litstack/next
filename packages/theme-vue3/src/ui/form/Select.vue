<template>
    <base-select v-bind="$attrs">
        <slot />
    </base-select>
</template>

<script lang="ts">
import { Select } from "@litstackjs/litstack-vue3";

export default Select;
</script>
