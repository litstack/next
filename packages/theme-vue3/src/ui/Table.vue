<template>
    <table>
        <thead>
            <tr>
                <base-th
                    v-for="(column, thKey) in schema"
                    :key="`th-${thKey}`"
                    :column="column"
                />
            </tr>
        </thead>
        <tbody>
            <tr v-for="(item, trKey) in items" :key="`th-${trKey}`">
                <base-td
                    v-for="(column, tdKey) in schema"
                    :key="`td-${tdKey}`"
                    :column="column"
                    :item="item"
                />
            </tr>
        </tbody>
    </table>
</template>

<script lang="ts">
import { defineComponent, PropType } from 'vue';
import { Th, Td, Index } from '@litstackjs/litstack-vue3';

export default defineComponent({
    components: { Th, Td },
    props: {
        table: {
            type: Object as PropType<Index>,
            required: true,
        },
    },
});
</script>
