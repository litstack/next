import { defineComponent, h } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";

const template = `
    <form @submit.prevent="submit()">
        <component
            v-for="(component, index) in schema"
            v-bind="component.props || {}"
            :is="component.name"
            :key="index"
            :form="form"
        />
    </form>
`;

let BaseForm = defineComponent({
    template,
    props: {
        schema: {
            type: Array,
            required: true,
        },
        model: {
            type: Object,
            required: true,
        },
        route: {
            type: String,
            required: true,
        },
        store: {
            type: Boolean,
            default: false,
        },
        attributes: {
            type: Array,
            required: true,
        },
    },
    setup(props) {
        let attributes = Object.keys(props.model)
            .filter((key) => props.attributes.includes(key))
            .reduce((obj, key) => {
                obj[key] = props.model[key];
                return obj;
            }, {});

        const form = useForm(attributes);

        function submit() {
            form.put(props.route);
        }

        return { form, submit };
    },
});

export default defineComponent({
    components: {
        BaseForm,
    },
});
