<template>
    <div>
        <h5>{{ '' }}</h5>
        <form-input v-bind="$attrs" />
    </div>
</template>

<script>
import { defineComponent } from 'vue';
import { FormInput } from '@litstackjs/litstack-vue3';

export default defineComponent({
    components: { FormInput },
});
</script>
