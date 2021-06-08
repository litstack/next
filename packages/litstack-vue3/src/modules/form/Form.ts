import { defineComponent } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";

import LitInput from "./fields/Input";
import LitRelationBelongsToSelect from "./fields/RelationBelongsToSelect";

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

export default defineComponent({
    template,
    name: "LitForm",
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
    components: {
        LitInput,
        LitRelationBelongsToSelect,
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
