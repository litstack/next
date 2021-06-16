import { defineComponent } from "vue";
import { h } from 'vue';

let BaseCheckbox = (props, context) => {
    return h(`input`, {
        type: 'checkbox',
        value: context.attrs.modelValue,
        onInput: ($event) => context.emit("update:modelValue", $event.target.value),
        ...props
    });
};

export default defineComponent({
    components: {
        BaseCheckbox,
    },
});
