import Checkbox from './ui/Checkbox.vue';
import Form from './ui/Form.vue';
import FormCheckboxes from './ui/FormCheckboxes.vue';
import FormInput from './ui/FormInput.vue';
import FormTextarea from './ui/FormTextarea.vue';
import Index from './ui/Index.vue';
import Input from './ui/Input.vue';
import Pagination from './ui/Pagination.vue';
import Table from './ui/Table.vue';
import Textarea from './ui/Textarea.vue';

const plugin = {
    install(app) {
        app.component('UiCheckbox', Checkbox);
        app.component('UiForm', Form);
        app.component('UiFormCheckboxes', FormCheckboxes);
        app.component('UiFormInput', FormInput);
        app.component('UiFormTextarea', FormTextarea);
        app.component('UiIndex', Index);
        app.component('UiInput', Input);
        app.component('UiPagination', Pagination);
        app.component('UiTable', Table);
        app.component('UiTextarea', Textarea);
    },
};

export { plugin };
