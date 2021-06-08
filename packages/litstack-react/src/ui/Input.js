import { Component } from "react";
// import { h } from 'vue';

// let BaseInput = (props, context) => {
//     return h(`input`, {
//         value:context.attrs.modelValue,
//         onInput: ($event) => context.emit("update:modelValue", $event.target.value)
//     });
// };

// export default defineComponent({
//     components: {
//         BaseInput,
//     },
// });

export default class Input extends Component {
    render(props) {
        return <input {...props} />;
    }
}
