import { Component } from "./../../../components";

const Input = (props) => {
    return (
        <Component
            is="ui-input"
            value={props.form.data[props.attribute]}
            onChange={(e) =>
                props.form.setData(props.attribute, e.target.value)
            }
        />
    );
};

export default Input;
