import { FieldTitle } from '@litstackjs/litstack-react';
import { FormCheckboxes as BaseFormCheckboxes } from '@litstackjs/litstack-react';

export default function FormCheckbox(props) {
    return (
        <div>
            <FieldTitle {...props} />
            <BaseFormCheckboxes {...props} />
        </div>
    );
}
