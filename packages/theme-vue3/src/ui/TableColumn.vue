<template>
	<td class="px-6 py-4 whitespace-nowrap">
		<div class="text-sm text-gray-900">
			Foo
			<!-- <value :item="item" :schema="schema" /> -->
		</div>
	</td>
</template>

<script>
// import Value from "./../../modules/index/IndexColumnValue.vue";

export default {
	name: 'UiTableColumn',
	components: {
		// Value,
	},
	props: {
		schema: {
			type: Object,
			required: true,
		},
		item: {
			type: Object,
			required: true,
		},
	},
};
</script>
