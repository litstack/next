import { defineComponent, h } from "vue";

export default defineComponent({
    props: {
        setPage: {
            type: Function,
            required: true
        },
        nextPage: {
            type: Function,
            required: true
        },
        prevPage: {
            type: Function,
            required: true
        },
        lastPage: {
            type: Function,
            required: true
        },
        hasNextPage: {
            type: Object,
            required: true
        },
        hasPrevPage: {
            type: Object,
            required: true
        },
        currentPage: {
            type: Object,
            required: true
        },
    }
});
