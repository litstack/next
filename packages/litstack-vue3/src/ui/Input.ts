import { defineComponent } from "vue";
import { h } from 'vue';

let BaseInput = (props, context) => {
    return h(`input`, {
        value:context.attrs.modelValue, 
        onInput: ($event) => context.emit("update:modelValue", $event.target.value)
    });
};

export default defineComponent({
    components: {
        BaseInput,
    },
});
