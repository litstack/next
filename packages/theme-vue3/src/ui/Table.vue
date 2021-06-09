<template>
	<table>
		<thead>
			<tr>
				<base-th
					v-bind="{ ...$attrs, ...column }"
					v-for="(column, thKey) in schema"
					:key="`th-${thKey}`"
				/>
			</tr>
		</thead>
		<tbody>
			<tr v-for="(item, trKey) in items.value" :key="`th-${trKey}`">
				<base-td
					v-bind="{ ...$attrs, ...column }"
					v-for="(column, tdKey) in schema"
					:key="`td-${tdKey}`"
					:item="item"
				/>
			</tr>
		</tbody>
	</table>
</template>

<script>
import { Table } from '@litstackjs/litstack-vue3';

export default Table;
</script>
