<template>
	<div class="grid grid-cols-app">
		<div class="col-span-1">
			<router-view />
		</div>
		<main-navigation :config="navigation" />
	</div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import MainNavigation from '../modules/main-navigation/MainNavigation.vue';
import { visit } from '../router';

export default defineComponent({
	components: { MainNavigation },
	name: 'App',
	props: ['page', 'navigation'],
	mounted() {
		visit(this.page, window.location.pathname);
	},
});
</script>
