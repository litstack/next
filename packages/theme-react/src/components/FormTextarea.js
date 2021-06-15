import { FormTextarea as BaseFormTextarea } from '@litstackjs/litstack-react';

const FormTextarea = function (props) {
    return (
        <div>
            <h5>{props.title}</h5>
            <BaseFormTextarea {...props} />
        </div>
    );
};

export default FormTextarea;
