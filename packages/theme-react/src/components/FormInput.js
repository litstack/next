import { FormInput as BaseFormInput } from '@litstackjs/litstack-react';

const Input = function (props) {
    return (
        <div>
            <h5>{props.title}</h5>
            <BaseFormInput {...props} />
        </div>
    );
};

export default Input;
