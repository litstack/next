import { FormInput as BaseFormInput } from '@litstackjs/litstack-react';

const FormInput = function (props) {
    return (
        <div>
            <h5>{props.title}</h5>
            <BaseFormInput {...props} />
        </div>
    );
};

export default FormInput;
