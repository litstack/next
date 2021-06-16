import { defineComponent, h } from "vue";
import BaseFieldTitle from './FieldTitle';

const template = `<component :is="inputComponent.name" v-bind="inputComponent.props" v-model="form[attribute]"/>`;

const BaseFormInput = defineComponent({
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
        inputComponent: {
            type: Object,
            required: true
        }
    },
});

export default defineComponent({
    components: { BaseFormInput, BaseFieldTitle },
});;