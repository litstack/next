<template>
	<div>
		<select v-model="form[attribute]" :value="form[attribute]">
			<option
				:value="item[ownerKey]"
				v-for="(item, index) in items"
				:key="index"
			>
				{{ item[value] }}
			</option>
		</select>
	</div>
</template>

<script>
import { defineComponent } from 'vue';

export default defineComponent({
	name: 'LitRelationBelongsToSelect',
	props: ['form', 'attribute', 'indexRoute', 'ownerKey', 'value'],
	data() {
		return {
			items: [],
		};
	},
	beforeMount() {
		this.loadItems();
	},
	methods: {
		async loadItems() {
			let response = await fetch(this.indexRoute);

			let json = await response.json();

			this.items = json.data;
		},
	},
});
</script>
