import { FieldTitle } from '@litstackjs/litstack-react';
import { FormInput as BaseFormInput } from '@litstackjs/litstack-react';

const FormInput = function (props) {
    return (
        <div>
            <FieldTitle {...props} />
            <BaseFormInput {...props} />
        </div>
    );
};

export default FormInput;
