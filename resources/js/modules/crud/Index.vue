<template>
	<main>
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
	</main>
</template>

<script lang="ts">
import { defineComponent } from 'vue';

export default defineComponent({
	name: 'Index',
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
	async beforeMount() {
		// fetch index
	},
});
</script>
