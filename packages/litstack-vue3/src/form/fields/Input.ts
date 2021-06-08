import { defineComponent } from "vue";

const template = `<component :is="inputComponentName" v-model="form[attribute]"/>`;

export default defineComponent({
    name: "LitInput",
    props: ["form", "attribute", "inputComponentName"],
    template
});