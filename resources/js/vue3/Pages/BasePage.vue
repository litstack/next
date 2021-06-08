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

<script>
import { defineComponent } from 'vue';

export default defineComponent({
	name: 'BasePage',
	props: ['components'],
});
</script>
