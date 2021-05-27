<template>
    <div class="grid grid-cols-app">
        <aside class="col-span-1 border-r h-screen overflow-scroll">
            <div v-for="(item, index) in items" :key="index">
                <router-link
                    :to="{
                        name: to,
                        params: {
                            item: item.id,
                        },
                    }"
                >
                    {{ item }}
                </router-link>
            </div>
        </aside>
        <main class="col-span-1">
            <router-view />
        </main>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';

export default defineComponent({
    name: 'SidebarIndex',
    props: {
        to: {
            type: [String],
            default: null,
        },
    },
    data() {
        return {
            items: [
                {
                    id: 1,
                    title: 'Foo',
                    bar: 'baz',
                },
                {
                    id: 2,
                    title: 'Foo',
                    bar: 'baz',
                },
            ],
        };
    },
});
</script>
