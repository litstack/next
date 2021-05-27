<template>
	<div>
		<component
			:is="itemsComponent.name"
			v-bind="itemsComponent.props"
			:items="items"
			v-on="events"
		/>
		<component
			v-if="paginationComponent"
			:is="paginationComponent.name"
			v-bind="paginationComponent.props"
			:items="items"
			v-on="events"
		/>
	</div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import Api from '../../common/api.service';
import { updateQueryString, getQueryStringParams } from '../../common/helpers';

export default defineComponent({
	name: 'UiIndex',
	props: {
		itemsComponent: {
			require: true,
			type: Object,
		},
		paginationComponent: {
			type: Object,
		},
		route: {
			required: true,
			type: String,
		},
		syncUrl: {
			type: Boolean,
			default: false,
		},
	},
	beforeMount() {
		console.log(this.itemsComponent);
	},
	methods: {
		loadItems(route) {
			console.log(route);
			this.busy = true;
			if (this.syncUrl) {
				this.applyUrlParameters(route);
			}
			Api.send('GET', route)
				.then(({ data, links }) => {
					this.items = data;
					this.links = links;
					this.busy = false;
				})
				.catch(() => {
					this.busy = false;
				});
		},
		applyUrlParameters(route) {
			let params: object = getQueryStringParams(new URL(route).search);
			let url = updateQueryString(window.location.href, params);
			if (window.history.replaceState) {
				window.history.replaceState({}, null, url);
			}
		},
		prev() {
			this.loadItems(this.links.prev);
		},
		next() {
			this.loadItems(this.links.next);
		},
	},
	mounted() {
		let route = this.route;
		if (this.syncUrl) {
			route += window.location.search;
		}
		this.loadItems(route);
	},
	data() {
		return {
			links: {
				prev: null,
				next: null,
			},
			items: [],
			events: {
				prev: this.prev,
				next: this.next,
			},
		};
	},
});
</script>
