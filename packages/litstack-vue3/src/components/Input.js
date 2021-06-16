import { h } from 'vue';

export default function Input({}, { attrs, emit }) {
    return h(`input`, {
        value: attrs.modelValue,
        onInput: ({ target }) => emit('update:modelValue', target.value),
    });
}
