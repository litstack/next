import Checkbox from './components/Checkbox';
import Form from './components/Form';
import FormCheckboxes from './components/FormCheckboxes';
import FormInput from './components/FormInput';
import FormTextarea from './components/FormTextarea';
import Index from './components/Index';
import IndexSearch from './components/IndexSearch';
import Input from './components/Input';
import Textarea from './components/Textarea';

const plugin = {
    install(addComponent) {
        addComponent('ui-checkbox', Checkbox);
        addComponent('ui-form', Form);
        addComponent('ui-form-checkboxes', FormCheckboxes);
        addComponent('ui-form-input', FormInput);
        addComponent('ui-form-textarea', FormTextarea);
        addComponent('ui-index', Index);
        addComponent('ui-index-search', IndexSearch);
        addComponent('ui-input', Input);
        addComponent('ui-textarea', Textarea);
    },
};

export { plugin };
