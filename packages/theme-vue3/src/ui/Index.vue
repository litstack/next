<template>
    <div>
        <index-search v-bind="{ ...$attrs }" :table="table" />
        <index-table v-bind="{ ...$attrs }" :table="table" />
        <index-pagination v-bind="{ ...$attrs }" :table="table" />
    </div>
</template>

<script>
import { defineComponent } from 'vue';
import {
    createIndex,
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
        const table = createIndex(attrs);

        table.loadItems();

        return { table };
    },
});
</script>
