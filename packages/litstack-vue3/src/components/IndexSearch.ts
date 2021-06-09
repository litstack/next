import { defineComponent, reactive, ref } from "vue";
const debounce = require('lodash.debounce');

export default defineComponent({
    props: {
        search: {
            type: Object,
            required: true
        },
        updateSearch: {
            type: Function,
            required: true
        }
    },
    setup() {
        return {
            debounce
        }
    }
});