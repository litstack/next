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
                v-bind:disabled="!table.hasPrevPage.value"
            >
                <span>previous</span>
            </button>
        </li>
        <li>
            <button
                @click="table.nextPage()"
                :disabled="!table.hasNextPage.value"
            >
                <span>Next</span>
            </button>
        </li>
        <li>
            <button @click="table.lastPage()">
                <span>last</span>
            </button>
        </li>
        <li>Page: {{ table.currentPage.value }}</li>
        <li>Total Pages:</li>
    </ul>
</template>

<script>
import { defineComponent } from 'vue';

export default defineComponent({
    props: {
        table: {
            type: Object,
            required: true,
        },
    },
});
</script>
