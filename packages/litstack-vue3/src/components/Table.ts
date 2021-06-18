import { h } from 'vue';
import { TTh, TTd } from '../..';

export const Th : TTh = function({ column }) {
    return h(`th`, {}, column.label);
}

export const Td : TTd = function({ item, column }) {
    return h(`td`, {}, item[column.value]);
}
