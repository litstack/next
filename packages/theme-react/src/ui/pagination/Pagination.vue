<template>
    <ul class="flex">
        <li
            :class="{
                'mx-1': true,
                'px-3': true,
                'py-2': true,
                'bg-gray-200': true,
                'text-gray-700': true,
                'hover:bg-gray-700': true,
                'hover:text-gray-200': true,
                'rounded-lg': true,
            }"
        >
            <a
                class="flex items-center font-bold"
                href="#"
                @click.prevent="$emit('prev')"
            >
                <span class="mx-1">previous</span>
            </a>
        </li>
        <li
            :class="{
                'mx-1': true,
                'px-3': true,
                'py-2': true,
                'bg-gray-200': true,
                'text-gray-700': true,
                'hover:bg-gray-700': true,
                'hover:text-gray-200': true,
                'rounded-lg': true,
            }"
        >
            <a
                class="flex items-center font-bold"
                href="#"
                @click.prevent="$emit('next')"
            >
                <span class="mx-1">Next</span>
            </a>
        </li>
    </ul>
</template>

<script lang="ts">
import { defineComponent } from "vue";
export default defineComponent({
    name: "UiPagination",
});
</script>
