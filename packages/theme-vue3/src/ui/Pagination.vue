<template>
    <ul>
        <li>
            <button @click="table.setPage(1)">
                <span>first</span>
            </button>
        </li>
        <li>
            <button
                @click="table.prevPage()"
                v-bind:disabled="!table.hasPrevPage"
            >
                <span>previous</span>
            </button>
        </li>
        <li>
            <button @click="table.nextPage()" :disabled="!table.hasNextPage">
                <span>Next</span>
            </button>
        </li>
        <li>
            <button @click="table.lastPage()">
                <span>last</span>
            </button>
        </li>
        <li>Page: {{ table.currentPage }}</li>
        <li>Total Pages:</li>
    </ul>
</template>

<script lang="ts">
import { defineComponent, PropType } from 'vue';
import { Index } from '@litstackjs/litstack-vue3';

export default defineComponent({
    props: {
        table: {
            type: Object as PropType<Index>,
            required: true,
        },
    },
});
</script>
