import { useCallback, useState, useEffect } from 'react';
import { Component } from '../components';
import debounce from 'lodash.debounce';
import { TIndexTable, TIndexSearch, TIndexPagination, TuseIndex } from '../..';
import { Model } from '@litstackjs/litstack';

export const IndexSearch : TIndexSearch = function({ searchComponent, hasSearch, table }) {
    if(! hasSearch) {
        return;
    }
    
    return (
        <Component
            name={searchComponent.name}
            props={searchComponent.props}
            table={table}
        />
    );
}

export const IndexTable : TIndexTable = function({ tableComponent, ...props }) {
    return (
        <Component
            name={tableComponent.name}
            props={tableComponent.props}
            {...props}
        />
    );
}

export const IndexPagination : TIndexPagination = function({ paginationComponent, ...props }) {
    return (
        <Component
            name={paginationComponent.name}
            props={paginationComponent.props}
            {...props}
        />
    );
}

const useIndex : TuseIndex = function({ route, syncUrl = false, defaultPerPage = 10 }) {
    let [busy, setBusy] = useState<boolean>(false);
    let [perPage, setPerPage] = useState<number>(defaultPerPage);
    let [items, setItems] = useState<Model[]>([]);
    let [hasNextPage, setHasNextPage] = useState<boolean>(false);
    let [hasPrevPage, setHasPrevPage] = useState<boolean>(false);
    let [currentPage, setPage] = useState<number>(1);
    let [filters, setFilters] = useState<any[]>([]);
    let [search, setSearch] = useState<string>('');
    let [fromItem, setFromItem] = useState<number>(0);
    let [toItem, setToItem] = useState<number>(0);
    let [totalItems, setTotalItems] = useState<number>(0);

    const getUrl = () => {
        let params = [
            `page=${currentPage}`,
            `search=${encodeURIComponent(search)}`
        ];

        for(let i=0;i<filters.length;i++) {
            params.push(`fitlers[]=${encodeURIComponent(filters[i])}`);
        }

        return `${route}?${params.join('&')}`;
    }

    const update = (data) => {
        setItems(data.data);
        setTotalItems(data.meta.total);
        setFromItem(data.meta.from);
        setToItem(data.meta.to);
        setPerPage(data.meta.per_page);
        setHasNextPage(currentPage < getLastPage());
        setHasPrevPage(currentPage > 1);
        setBusy(false);
    }

    const loadItems = useCallback<() => void>(() => {
        setBusy(true);
        fetch(getUrl())
            .then(response => response.json())
            .then(update)
            .catch(() => setBusy(false));
    }, [setBusy, getUrl, update]);

    const reload = () => {
        this.loadItems();
    };

    const addFilter = useCallback<(filter: string) => void>((filter) => {
        setFilters((filters) => [...filters, filter]);
        reload();
    }, [reload, setFilters])

    const removeFilter = useCallback<(filter: string) => void>((filter) => {
        setFilters((filters) => {
            // todo

            return filters;
        });
        reload();
    }, [reload, setFilters])

    const getLastPage = () => {
        return Math.ceil(totalItems / perPage);
    }

    useEffect(() => {
        if(currentPage < 1 || currentPage > getLastPage()) {
            return;
        }

        reload();
    }, [currentPage]);

    const updateSearch = useCallback<(e: string??|??object) => void>((e) => {
        if(e instanceof Event) {
            setSearch((e.target as HTMLTextAreaElement).value);
        } else {
            setSearch(e as string);
        }

        reload();
    }, [setSearch, reload]);

    const nextPage = () => useCallback(() => {
        setPage((p) => p + 1);
    }, [setPage]);

    const prevPage = () => useCallback(() => {
        setPage((p) => p - 1);
    }, [setPage]);

    const lastPage = () => useCallback(() => {
        setPage(getLastPage());
    }, [setPage, getLastPage]);

    return {
        busy,
        perPage,
        items,
        currentPage,
        hasNextPage,
        hasPrevPage,
        filters,
        search,
        fromItem,
        toItem,
        totalItems,
        loadItems,
        reload,
        updateSearch,
        addFilter,
        removeFilter,
        getLastPage,
        setPage,
        nextPage,
        prevPage,
        lastPage,
    };
}

export default useIndex;
