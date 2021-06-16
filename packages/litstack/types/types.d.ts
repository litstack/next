export declare interface Component {
    name: string,
    props: Record<string, any>[]
}

export declare interface FormProps {
    model: Record<string, any>, 
    attributes: string[], 
    route: string, 
    schema: Component[]
}

export declare interface CreateIndexProps {
    route: string,
    syncUrl?: boolean,
    defaultPerPage?: number,
}

export declare interface IndexSearchProps {
    searchComponent: Component
}

export declare interface IndexTableProps {
    tableComponent: Component
}

export declare interface IndexPaginationProps {
    paginationComponent: Component
}

export declare interface FormInputProps<TForm> {
    form: TForm,
    attribute: string,
    inputComponent: Component
}