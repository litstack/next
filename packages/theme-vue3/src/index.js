import Input from './ui/Input.vue';
import Select from './ui/Select.vue';
import Table from './ui/Table.vue';
import Pagination from './ui/Pagination.vue';

const plugin = {
	install(app) {
		app.component('UiInput', Input);
		app.component('UiSelect', Select);
		app.component('UiTable', Table);
		app.component('UiPagination', Pagination);
	},
};

export { plugin };
