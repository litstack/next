import * as Litstack from '@litstackjs/litstack'
import { DefineComponent, FunctionalComponent, Ref } from 'vue'
import { InertiaForm } from '@inertiajs/inertia-vue3';

export declare type Form = DefineComponent<Litstack.FormProps>;

interface Index {
    busy: Ref<boolean>,
    perPage: Ref<number>,
    items: Ref<Record<string, any>[]>,
    hasNextPage: Ref<boolean>,
    perhasPrevPagePage: Ref<boolean>,
    currentPage: Ref<number>,
    filters: Ref<Litstack.Component[]>,
    search: Ref<string>,
    fromItem: Ref<number>,
    toItem: Ref<number>,
    totalItems: Ref<number>,
    reload: () => void
    loadItems: () => void,
    removeFilter: (filter: string) => void,
    setPage: (page: number) => void
    nextPage: () => void,
    prevPage: () => void,
    lastPage: () => void,
}

export declare function createIndex<TIndex>(props: Litstack.CreateIndexProps): Index;

export declare type IndexSearch = DefineComponent<Litstack.IndexSearchProps>;

export declare type IndexTable = DefineComponent<Litstack.IndexTableProps>;

export declare type IndexPagination = DefineComponent<Litstack.IndexPaginationProps>;

export declare type FormInput = FunctionalComponent<Litstack.FormInputProps<InertiaForm>>;