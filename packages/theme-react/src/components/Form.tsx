import { Form as BaseForm, useForm } from '@litstackjs/litstack-react';

export default function Form(props) {
    const form = useForm(props);

    return <BaseForm {...props} form={form} />;
}
