import Checkbox from './ui/Checkbox.vue';
import Form from './ui/Form.vue';
import FormCheckboxes from './ui/FormCheckboxes.vue';
import FormInput from './ui/FormInput.vue';
import Index from './ui/Index.vue';
import IndexSearch from './ui/IndexSearch.vue';
import Input from './ui/Input.vue';
import Pagination from './ui/Pagination.vue';
import Table from './ui/Table.vue';

const plugin = {
	install(app) {
		app.component('UiCheckbox', Checkbox);
		app.component('UiForm', Form);
		app.component('UiFormCheckboxes', FormCheckboxes);
		app.component('UiFormInput', FormInput);
		app.component('UiIndex', Index);
		app.component('UiIndexSearch', IndexSearch);
		app.component('UiInput', Input);
		app.component('UiPagination', Pagination);
		app.component('UiTable', Table);
	},
};

export { plugin };
