<template>
	<div class="p-8">
		<h2>{{ title }}</h2>

		<component
			:is="component.name"
			v-for="(component, index) in components"
			:key="index"
			v-bind="component.props"
		/>
	</div>
</template>

<script lang="ts">
export default {
	props: ['resource', 'components', 'title'],
	data() {
		return {
			busy: true,
			data: {},
		};
	},
	beforeMount() {
		this.loadResource(this.resource);
	},
	methods: {
		loadResource(route) {
			this.busy = true;
			const request = new XMLHttpRequest();
			request.open(route.method, route.route);
			request.setRequestHeader('Accept', 'application/json');
			request.onload = (e) => {
				if (request.status != 200) {
					return;
				}
				this.data = JSON.parse(request.responseText);
			};
			request.send();
		},
	},
};
</script>

<style></style>
