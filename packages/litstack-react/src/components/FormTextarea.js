import { Component } from '../components';

const FormTextarea = (props) => {
    return (
        <Component
            is={props.textareaComponent.name}
            {...props.textareaComponent.props}
            value={props.form.data[props.attribute]}
            onChange={(e) =>
                props.form.setData(props.attribute, e.target.value)
            }
        />
    );
};

export default FormTextarea;
