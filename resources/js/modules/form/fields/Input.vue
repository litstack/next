<template>
	<input v-model="form[attribute]" />
</template>

<script>
import { defineComponent } from 'vue';
export default defineComponent({
	name: 'LitInput',
	props: ['form', 'attribute'],
});
</script>
