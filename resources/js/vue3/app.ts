import { createApp, h } from 'vue';
import {
	App as InertiaApp,
	plugin as InertiaPlugin,
} from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { plugin as LitstackPlugin } from '@litstackjs/litstack-vue3';
import { plugin as LitstackTheme } from '@litstackjs/theme-vue3';

const el = document.getElementById('app');

const app = createApp({
	render: () =>
		h(InertiaApp, {
			initialPage: JSON.parse(el.dataset.page),
			resolveComponent: (name) => require(`./Pages/${name}`).default,
		}),
})
	.use(InertiaPlugin)
	.use(LitstackPlugin)
	.use(LitstackTheme);

app.mount(el);

InertiaProgress.init();
