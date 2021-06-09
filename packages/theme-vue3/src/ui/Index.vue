<template>
	<div>
		<index-search v-bind="{ ...$attrs, ...table }" />
		<index-table v-bind="{ ...$attrs, ...table }" />
		<index-pagination v-bind="{ ...$attrs, ...table }" />
	</div>
</template>

<script>
import { Index } from '@litstackjs/litstack-vue3';

export default Index;
</script>
