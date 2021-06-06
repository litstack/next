import { createApp, h } from 'vue'
import { App as InertiaApp, plugin as InertiaPlugin } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';

import Form from './modules/form/Form.vue'
import Index from './modules/index/Index.vue'
import Table from './ui/table/Table.vue'
import Pagination from './ui/pagination/Pagination.vue'
import './assets/app.css'

const el = document.getElementById('app');

const app = createApp({
    render: () =>
        h(InertiaApp, {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: (name) => require(`./Pages/${name}`).default,
        }),
}).use(InertiaPlugin);

app.component('lit-form', Form)
app.component('ui-index', Index)
app.component('ui-table', Table)
app.component('ui-pagination', Pagination)

app.mount(el)

InertiaProgress.init();