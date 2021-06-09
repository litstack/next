<template>
	<ul>
		<li>
			<button @click="setPage(1)">
				<span>first</span>
			</button>
		</li>
		<li>
			<button @click="prevPage()" v-bind:disabled="!hasPrevPage.value">
				<span>previous</span>
			</button>
		</li>
		<li>
			<button @click="nextPage()" :disabled="!hasNextPage.value">
				<span>Next</span>
			</button>
		</li>
		<li>
			<button @click="lastPage()">
				<span>last</span>
			</button>
		</li>
		<li>Page: {{ currentPage.value }}</li>
		<li>Total Pages:</li>
	</ul>
</template>

<script>
import { Pagination } from '@litstackjs/litstack-vue3';

export default Pagination;
</script>
