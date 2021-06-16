import { useState } from 'react';
import { Component } from './../components';
let debounce = require('lodash.debounce');

function IndexSearch(props) {
    return (
        <Component
            is={props.searchComponent.name}
            {...props.searchComponent.props}
            {...props}
        />
    );
}

function IndexTable() {
    return (
        <Component
            is={props.tableComponent.name}
            {...props.tableComponent.props}
            {...props}
        />
    );
}

function IndexPagination() {
    return (
        <Component
            is={props.paginationComponent.name}
            {...props.paginationComponent.props}
            {...props}
        />
    );
}

function createIndex(props) {
    let busy = useState(false);
    let perPage = useState(props.defaultPerPage);
    let items = useState([]);
    let hasNextPage = useState(false);
    let hasPrevPage = useState(false);
    let currentPage = useState(1);
    let filters = useState([]);
    let [search, setSearch] = useState('');
    let fromItem = useState(0);
    let toItem = useState(0);
    let totalItems = useState(0);

    let updateSearch = ($event) => {
        if (typeof $event == 'object' && 'target' in $event) {
            setSearch($event.target.value);
        } else {
            setSearch($event);
        }

        // reload();
    };

    return {
        busy,
        perPage,
        items,
        hasNextPage,
        hasPrevPage,
        currentPage,
        filters,
        search,
        fromItem,
        toItem,
        totalItems,
        updateSearch,
    };
}

export { IndexSearch, IndexTable, IndexPagination };

export default createIndex;
