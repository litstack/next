<template>
    <div>
        <component
            v-for="(component, index) in components"
            v-bind="component.props"
            :is="component.name"
            :key="index"
        />
    </div>
</template>

<script lang="ts">
import { defineComponent, PropType } from 'vue';
import { Component } from '@litstackjs/litstack';

export default defineComponent({
    name: 'BasePage',
    props: {
        components: {
            required: true,
            type: Array as PropType<Component[]>,
        },
    },
});
</script>
