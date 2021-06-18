<template>
    <div>
        <index-search v-bind="{ ...$attrs }" :table="table" />
        <index-table v-bind="{ ...$attrs }" :table="table" />
        <index-pagination v-bind="{ ...$attrs }" :table="table" />
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import { UseIndexAttrs } from '@litstackjs/litstack';
import {
    useIndex,
    IndexTable,
    IndexSearch,
    IndexPagination,
} from '@litstackjs/litstack-vue3';

export default defineComponent({
    components: {
        IndexSearch,
        IndexTable,
        IndexPagination,
    },
    setup(props, { attrs }) {
        const table = useIndex(<UseIndexAttrs>attrs);

        table.loadItems();

        return { table };
    },
});
</script>
