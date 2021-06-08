import Form from './modules/form/Form';
import Input from './modules/form/Fields/Input';

const plugin = {
    install(addComponent) {
        addComponent('lit-form', Form);
        addComponent('lit-input', Input);
    }
}

export { plugin };
