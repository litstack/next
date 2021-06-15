import { Component } from '../components';
import { id } from '@litstackjs/litstack';
import pickBy from 'lodash.pickby';

function updateFormValue(e, form, attribute, value) {
    let original = form.data[attribute];

    if (!Array.isArray(original)) {
        original = [];
    }

    if (e.target.checked && !(value in original)) {
        original.push(value);
    }

    if (!e.target.checked) {
        original = original.filter((v) => !v == value);
    }

    form.setData(attribute, original);
}

const FormCheckboxes = (props) => {
    const attributes = pickBy(
        props,
        (v, key) => !['checkboxComponent'].includes(key)
    );

    return Object.keys(props.options).map((value, index) => {
        return (
            <div {...attributes} key={value}>
                <Component
                    is={props.checkboxComponent.name}
                    {...props.checkboxComponent.props}
                    id={id(value, false)}
                    onChange={(e) =>
                        updateFormValue(e, props.form, props.attribute, value)
                    }
                />
                <label
                    dangerouslySetInnerHTML={{ __html: props.options[value] }}
                    htmlFor={id(value)}
                    className={props.labelClass}
                />
            </div>
        );
    });
};

export default FormCheckboxes;
