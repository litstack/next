import { h } from 'vue';

export function BaseTh({ column }) {
    return h(`th`, {}, column.label);
}

export function BaseTd({ item, column }) {
    return h(`td`, {}, item[column.value]);
}
