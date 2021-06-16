import { h } from 'vue';

let FieldTitle = (props, context) => {
    if(!props.hasTitle) {
        return;
    }

    return h(props.titleTag || 'h5', {
        innerHTML: props.title
    });
};

export default FieldTitle;