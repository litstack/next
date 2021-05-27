import { createApp } from 'vue'
import App from './layouts/App.vue'
import Foo from './layouts/Foo.vue'
import { router } from './router'

import Index from './modules/index/Index.vue'
import Table from './ui/table/Table.vue'
import Pagination from './ui/pagination/Pagination.vue'
import './assets/app.css'

const app = createApp({
    components: {
        App,
        Foo
    }
});

app.component('ui-index', Index)
app.component('ui-table', Table)
app.component('ui-pagination', Pagination)
app.use(router);
app.mount('#app');