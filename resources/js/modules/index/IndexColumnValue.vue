<template>
	<span v-html="getValue(item, schema.value)"></span>
</template>

<script>
export default {
	methods: {
		getValue(item, value) {
			for (let key in item) {
				value = value.replace(`{${key}}`, item[key]);
			}

			return value;
		},
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
