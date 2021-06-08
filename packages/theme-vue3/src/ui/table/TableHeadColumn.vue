<template>
    <th
        class="
            px-6
            py-3
            text-left text-xs
            font-medium
            text-gray-500
            uppercase
            tracking-wider
        "
    >
        {{ schema.label }}
    </th>
</template>

<script lang="ts">
export default {
    name: "UiTableColumn",
    props: {
        schema: {
            type: Object,
            required: true,
        },
        item: {
            type: Object,
            required: true,
        },
    },
};
</script>
