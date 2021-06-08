import Input from './ui/form/Input'

const plugin = {
    install(addComponent) {
        addComponent('ui-input', Input);
    }
}

export { plugin };