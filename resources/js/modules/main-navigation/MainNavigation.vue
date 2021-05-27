<template>
	<aside class="h-screen overflow-scroll col-span-1 bg-gray-900">
		<header>
			<!-- Logo -->
			<!-- Secondary Nav -->
		</header>
		<nav class="flex flex-col text-white">
			<!-- Main Nav -->
			<a
				href="#"
				v-for="(item, index) in config"
				:key="index"
				@click.prevent="navigateTo(item.route)"
			>
				{{ item.title }}
			</a>
			<!-- <router-link :to="{ name: 'Posts' }">Posts</router-link>
			<router-link :to="{ name: 'Mails' }">Mails</router-link> -->
		</nav>
	</aside>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import { navigateTo } from './../../router/index';

export default defineComponent({
	name: 'MainNavigation',
	props: ['config'],
	data() {
		return {
			sections: [
				{
					title: 'Models',
					items: [
						{
							title: 'Posts',
							icon: '…',
						},
						{
							title: 'Parent',
							icon: '…',
							children: [
								{
									title: 'child',
									icon: '…',
								},
							],
						},
					],
				},
			],
		};
	},
	beforeCreate() {
		// fetch nav entries
	},
	methods: {
		navigateTo(route: string) {
			navigateTo(route);
		},
	},
});
</script>
