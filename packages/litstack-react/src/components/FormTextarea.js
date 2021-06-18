import { Component } from '../components';

const FormTextarea = ({ textareaComponent, form, attribute }) => {
    return (
        <Component
            is={textareaComponent.name}
            {...textareaComponent.props}
            value={form.data[attribute]}
            onChange={(e) => props.form.setData(attribute, e.target.value)}
        />
    );
};

export default FormTextarea;
