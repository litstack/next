import { defineComponent } from "vue";
import { h } from 'vue';

let BaseTextarea = (props, context) => {
    return h(`textarea`, {
        value: context.attrs.modelValue,
        onInput: ($event) => context.emit("update:modelValue", $event.target.value)
    });
};

export default defineComponent({
    components: {
        BaseTextarea,
    },
});
