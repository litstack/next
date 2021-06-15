import { FormCheckboxes as BaseFormCheckboxes } from '@litstackjs/litstack-react';

const FormCheckbox = function (props) {
    return (
        <div>
            <h5>{props.title}</h5>
            <BaseFormCheckboxes {...props} />
        </div>
    );
};

export default FormCheckbox;
