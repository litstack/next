import { h } from 'vue';
import { TFieldTitle } from '../..';

const FieldTitle : TFieldTitle = ({ title, hasTitle, titleTag }) => {
    if (!hasTitle) {
        return;
    }

    const Tag = (titleTag || 'h5');

    return h(Tag, {
        innerHtml: title
    });
};

export default FieldTitle;
