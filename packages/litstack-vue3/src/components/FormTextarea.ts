import { defineComponent, h } from "vue";
import BaseFieldTitle from './FieldTitle';

const template = `
    <component 
        v-model="form[attribute]"
        v-bind="textareaComponent.props" 
        :is="textareaComponent.name" 
    />
`;

const BaseFormTextarea = defineComponent({
    template,
    props: {
        form: {
            type: Object,
            required: true,
        }, 
        attribute: {
            type: String,
            required: true
        }, 
        textareaComponent: {
            type: Object,
            required: true
        }
    },
});

export default defineComponent({
    components: { BaseFormTextarea, BaseFieldTitle },
});;