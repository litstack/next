import * as Litstack from '@litstackjs/litstack'
import { FunctionComponent, Component as ReactComponent } from 'react'
import { InertiaFormProps } from '@inertiajs/inertia-react';

type Data = Record<string, undefined>;
type Model = Record<string, any>;

type TaddComponent = (name: string, component: FunctionComponent | ReactComponent) => void;
type TPlugin = {
    install: (addComponent: TaddComponent) => void
}
export const plugin: TPlugin;

type ReactComponentProps = Litstack.Component & {
    key?: unknown,
    [key: string]: any
}
type TComponent = FunctionComponent<ReactComponentProps>;
export const Component : TComponent;

type TLitstackForm<TItem = Model> = InertiaFormProps<TItem> & {
    submit(e: Event | any): void
}

type TuseForm<TItem = Model> = (props: Litstack.UseFormProps) => TLitstackForm<TItem>;
export const useForm : TuseForm;

type TFormProps = Litstack.FormProps & {
    form: TLitstackForm
}
type TForm = FunctionComponent<TFormProps>;
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

type TIndexSearch = FunctionComponent<Litstack.IndexSearchProps>;
export const IndexSearch : TIndexSearch;

type TIndexTable = FunctionComponent<Litstack.IndexTableProps>;
export const IndexTable : TIndexTable;

type TIndexPagination = FunctionComponent<Litstack.IndexPaginationProps>
export const IndexPagination : TIndexPagination;

type TFormInput = FunctionComponent<Litstack.FormInputProps<InertiaFormProps<Record<string, any>>>>;
export const FormInput : TFormInput;

type TFormTextarea = FunctionComponent<Litstack.FormTextareatProps<InertiaFormProps<Record<string, any>>>>;
export const FormTextarea : TFormTextarea;

type TFormCheckboxes = FunctionComponent<Litstack.FormCheckboxesProps<InertiaFormProps<Record<string, any>>>>;
export const FormCheckboxes : TFormCheckboxes;

type TTd = FunctionComponent<Litstack.TdProps>;
export const Td : TTd;

type TTh = FunctionComponent<Litstack.ThProps>;
export const Th : TTh;

type TTextarea = FunctionComponent<Data>;
export const Textarea : TTextarea;

type TInput = FunctionComponent<Data>;
export const Input : TInput;

type TCheckbox = FunctionComponent<Data>;
export const Checkbox : TCheckbox;

type TFieldTitle = FunctionComponent<Litstack.FieldTitleProps>;
export const FieldTitle : TFieldTitle;