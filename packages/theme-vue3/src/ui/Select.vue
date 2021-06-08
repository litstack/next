<template>
	<base-select v-bind="$attrs">
		<slot />
	</base-select>
</template>

<script>
import { Select } from '@litstackjs/litstack-vue3';

export default Select;
</script>
