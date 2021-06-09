import { defineComponent, h, Ref } from "vue";

const BaseTh = (props) => {
    return h(`th`, {}, props.label);
};

const BaseTd = (props) => {
    return h(`td`, {}, props.item[props.value]);
};

export default defineComponent({
    components: { BaseTh, BaseTd },
    props: {
        schema: {
            type: Array,
            required: true
        },
        items: {
            type: Object,
            required: true
        },
        busy: {
            type: Object,
            default: false
        }
    }
});
