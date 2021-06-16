import { FieldTitle } from '@litstackjs/litstack-react';
import { FormCheckboxes as BaseFormCheckboxes } from '@litstackjs/litstack-react';

const FormCheckbox = function (props) {
    return (
        <div>
            <FieldTitle {...props} />
            <BaseFormCheckboxes {...props} />
        </div>
    );
};

export default FormCheckbox;
