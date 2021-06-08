// import Input from './ui/form/Input.vue'
import Input from './ui/Input.vue'
import Select from './ui/form/Select.vue'
import Table from './ui/table/Table.vue'
import Pagination from './ui/pagination/Pagination.vue'

const plugin = {
    install(app) {
        app.component('UiInput', Input);
        app.component('UiSelect', Select);
        app.component('UiTable', Table);
        app.component('UiPagination', Pagination);
    }
}

export {
    plugin
}