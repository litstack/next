<template>
	<ui-input :value="search" @input="updateSearch" />
</template>

<script>
import { IndexSearch } from '@litstackjs/litstack-vue3';

export default IndexSearch;
</script>
