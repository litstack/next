<template>
    <div>
        <component
            :is="component.name"
            v-for="(component, index) in components"
            :key="index"
            v-bind="component.props"
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
