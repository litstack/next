import { resolveComponent, h } from 'vue';

export default function FormInput({ form, attribute, inputComponent }) {
    const Input = resolveComponent(inputComponent.name);

    return h(Input, {
        ...inputComponent.props,
        modelValue: form[attribute],
        'onUpdate:modelValue': (value) => {
            form[attribute] = value;
            console.log(value, form[attribute]);
        },
    });
}
