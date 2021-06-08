<template>
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <table-head-column
                    :item="item"
                    :schema="column"
                    v-for="(column, index) in schema"
                    :key="index"
                />
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <tr v-for="(item, index) in items" :key="index">
                <table-column
                    :item="item"
                    :schema="column"
                    v-for="(column, index) in schema"
                    :key="index"
                />
            </tr>
        </tbody>
    </table>
</template>

<script lang="ts">
import { defineComponent } from "vue";

import TableColumn from "./TableColumn.vue";
import TableHeadColumn from "./TableHeadColumn.vue";

export default defineComponent({
    name: "UiTable",
    components: {
        TableColumn,
        TableHeadColumn,
    },
    props: {
        items: {
            required: true,
            type: Array,
        },
        schema: {
            type: Array,
            required: true,
        },
    },
});
</script>
