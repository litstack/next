<template>
	<form @submit.prevent="submit()">
		<component
			v-for="(component, index) in schema"
			v-bind="component.props || {}"
			:is="component.name"
			:key="index"
			:form="form"
		/>
	</form>
</template>

<script>
import { defineComponent } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3';

import LitInput from './fields/Input';
import LitRelationBelongsToSelect from './fields/RelationBelongsToSelect';

export default defineComponent({
	name: 'LitForm',
	props: ['schema', 'model', 'route', 'store', 'attributes'],
	components: {
		LitInput,
		LitRelationBelongsToSelect,
	},
	setup(props) {
		let attributes = Object.keys(props.model)
			.filter((key) => props.attributes.includes(key))
			.reduce((obj, key) => {
				obj[key] = props.model[key];
				return obj;
			}, {});

		const form = useForm(attributes);

		console.log(attributes);

		function submit() {
			form.put(props.route);
		}

		return { form, submit };
	},
});
</script>

<style></style>
