import Form from './form/Form';
import Input from './form/Fields/Input';

const plugin = {
    install(addComponent) {
        addComponent('lit-form', Form);
        addComponent('lit-input', Input);
    }
}

export { plugin };
