import * as Litstack from '@litstackjs/litstack'
import { DefineComponent, FunctionalComponent, Plugin } from 'vue'
import { InertiaForm } from '@inertiajs/inertia-vue3';

type Data = Record<string, undefined>;
type Model = Record<string, any>;

export const plugin: Plugin;

type TLitstackForm<TItem = Model> =  {
    submit(e?: Event | any): void,
    get: undefined,
    post: undefined,
    put: undefined,
    patch: undefined,
    delete: undefined,
} & InertiaForm<TItem>

type TuseForm<TItem = Model> = (props: Litstack.UseFormProps) => TLitstackForm<TItem>;
export const useForm : TuseForm;

type TFormProps = Litstack.FormProps & {
    form: TLitstackForm
}
type TForm = FunctionalComponent<TFormProps>;
export const Form : TForm;

interface Index<TItem = any> {
    busy: boolean,
    perPage: number,
    items: TItem[],
    hasNextPage: boolean,
    hasPrevPage: boolean,
    currentPage: number,
    filters: any[],
    search: string,
    fromItem: number,
    toItem: number,
    totalItems: number,
    reload: () => void
    loadItems: () => void,
    addFilter: (filter: string) => void,
    removeFilter: (filter: string) => void,
    setPage: (page: number) => void
    nextPage: () => void,
    prevPage: () => void,
    lastPage: () => void,
    updateSearch: (e: string | object) => void
}
type TuseIndex<TItem = Model> = (props: Litstack.UseIndexProps) => Index<TItem>;
export const useIndex : TuseIndex;

type TIndexSearch = FunctionalComponent<Litstack.IndexSearchProps & {
    table: Index
}>;
export const IndexSearch : TIndexSearch;

type TIndexTable = FunctionalComponent<Litstack.IndexTableProps>;
export const IndexTable : TIndexTable;

type TIndexPagination = FunctionalComponent<Litstack.IndexPaginationProps>
export const IndexPagination : TIndexPagination;

type TFormInput = FunctionalComponent<Litstack.FormInputProps<InertiaForm<Record<string, any>>>>;
export const FormInput : TFormInput;

type TFormTextarea = FunctionalComponent<Litstack.FormTextareatProps<InertiaForm<Record<string, any>>>>;
export const FormTextarea : TFormTextarea;

type TFormCheckboxes = FunctionalComponent<Litstack.FormCheckboxesProps<InertiaForm<Record<string, any>>>>;
export const FormCheckboxes : TFormCheckboxes;

type TTd = FunctionalComponent<Litstack.TdProps>;
export const Td : TTd;

type TTh = FunctionalComponent<Litstack.ThProps>;
export const Th : TTh;

type TTextarea = FunctionalComponent<Data>;
export const Textarea : TTextarea;

type TInput = FunctionalComponent<Data>;
export const Input : TInput;

type TCheckbox = FunctionalComponent<Data>;
export const Checkbox : TCheckbox;

type TFieldTitle = FunctionalComponent<Litstack.FieldTitleProps>;
export const FieldTitle : TFieldTitle;