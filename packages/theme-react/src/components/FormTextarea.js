import { FieldTitle } from '@litstackjs/litstack-react';
import { FormTextarea as BaseFormTextarea } from '@litstackjs/litstack-react';

const FormTextarea = function (props) {
    return (
        <div>
            <FieldTitle {...props} />
            <BaseFormTextarea {...props} />
        </div>
    );
};

export default FormTextarea;
