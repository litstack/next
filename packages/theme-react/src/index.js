import Input from './ui/Input';

const plugin = {
	install(addComponent) {
		addComponent('ui-input', Input);
	},
};

export { plugin };
