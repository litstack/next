import { defineComponent, h } from "vue";

function updateFormValue(e, form, attribute, value) {
    console.log(e);
    let original = form.data[attribute];

    if (!Array.isArray(original)) {
        original = [];
    }

    if (e.target.checked && !(value in original)) {
        original.push(value);
    }

    if (!e.target.checked) {
        original = original.filter((v) => !v == value);
    }

    form[attribute] = original;
}

const template = `
    <template
        v-for="(label, value) in options"
        :key="value"
    >
        <component
            v-bind="checkboxComponent.props" 
            v-model="form[attribute]"
            :is="checkboxComponent.name" 
            :id="value"
            @input="updateFormValue($event, form, attribute, value)"
        />
        <label v-html="label" :for="value"/>
    </template>
`;

const BaseFormCheckboxes = defineComponent({
    template,
    props: {
        form: {
            type: Object,
            required: true,
        }, 
        attribute: {
            type: String,
            required: true
        }, 
        checkboxComponent: {
            type: Object,
            required: true
        },
        options: {
            required: true,
            type: Object
        }
    },
    setup() {
        return { updateFormValue }
    }
});

export default defineComponent({
    components: { BaseFormCheckboxes },
});;