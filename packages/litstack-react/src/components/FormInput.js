import { Component } from '../components';

const FormInput = (props) => {
    return (
        <Component
            is={props.inputComponent.name}
            {...props.inputComponent.props}
            value={props.form.data[props.attribute]}
            onChange={(e) =>
                props.form.setData(props.attribute, e.target.value)
            }
        />
    );
};

export default FormInput;
