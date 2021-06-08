import { useForm } from '@inertiajs/inertia-react';
import { Component } from '../components';
import pickBy from 'lodash.pickby';

const Form = (props) => {
	let attributes = pickBy(props.model, (value, key) =>
		props.attributes.includes(key)
	);

	const form = useForm(attributes);

	function submit(e) {
		e.preventDefault();
		form.put(props.route);
	}

	return (
		<form onSubmit={submit}>
			{props.schema.map((component, i) => (
				<Component
					key={i}
					is={component.name}
					{...component.props}
					form={form}
				/>
			))}
		</form>
	);
};

export default Form;
