import { defineComponent, ref } from 'vue';
const debounce = require('lodash.debounce');

const IndexSearch = defineComponent({
    props: {
        searchComponent: {
            type: Object,
        },
    },
    template: `
        <component 
            :is="searchComponent.name" 
            v-bind="{ ...searchComponent.props, ...$attrs }" 
        />
    `,
});

const IndexTable = defineComponent({
    props: {
        tableComponent: {
            type: Object,
        },
    },
    template: `
        <component 
            :is="tableComponent.name" 
            v-bind="{ ...tableComponent.props, ...$attrs }" 
        />
    `,
});

const IndexPagination = defineComponent({
    props: {
        paginationComponent: {
            type: Object,
        },
    },
    template: `
        <component 
            :is="paginationComponent.name" 
            v-bind="{ ...paginationComponent.props, ...$attrs }" 
        />
    `,
});

function createIndex({ route, syncUrl = false, defaultPerPage = 10 }) {
    let busy = ref(false);
    let perPage = ref(defaultPerPage);
    let items = ref([]);
    let hasNextPage = ref(false);
    let hasPrevPage = ref(false);
    let currentPage = ref(1);
    let filters = ref([]);
    let search = ref('');
    let fromItem = ref(0);
    let toItem = ref(0);
    let totalItems = ref(0);

    function getUrl() {
        let params = [
            `page=${currentPage.value}`,
            `search=${encodeURIComponent(search.value)}`,
        ];

        for (let i = 0; i < filters.value.length; i++) {
            params.push(`fitlers[]=${encodeURIComponent(filters.value[i])}`);
        }

        return `${route}?${params.join('&')}`;
    }

    function getLastPage() {
        return Math.ceil(totalItems.value / perPage.value);
    }

    function update(data) {
        items.value = data.data;
        totalItems.value = data.meta.total;
        fromItem.value = data.meta.from;
        toItem.value = data.meta.to;
        perPage.value = data.meta.per_page;
        hasNextPage.value = currentPage.value < getLastPage();
        hasPrevPage.value = currentPage.value > 1;

        busy.value = false;
    }

    function loadItems() {
        busy.value = true;
        fetch(getUrl())
            .then((response) => response.json())
            .then(update)
            .catch(() => (busy.value = false));
    }

    function reload() {
        loadItems();
    }

    function addFilter(filter) {
        filters.value.push(filter);
        reload();
    }

    function removeFilter(filter) {
        //
        reload();
    }

    let updateSearch = debounce(($event) => {
        if (typeof $event == 'object' && 'target' in $event) {
            search.value = $event.target.value;
        } else {
            search.value = $event;
        }

        reload();

        console.log(search.value);
    }, 500);

    function setPage(newPage) {
        if (newPage < 1 || newPage > getLastPage()) {
            return;
        }

        currentPage.value = newPage;

        reload();
    }

    function nextPage() {
        setPage(currentPage.value + 1);
    }

    function prevPage() {
        setPage(currentPage.value - 1);
    }

    function lastPage() {
        setPage(getLastPage());
    }

    return {
        search,
        busy,
        items,
        totalItems,
        fromItem,
        toItem,
        hasNextPage,
        hasPrevPage,
        currentPage,
        perPage,
        reload,
        addFilter,
        removeFilter,
        updateSearch,
        setPage,
        nextPage,
        prevPage,
        lastPage,
    };
}

export { IndexSearch, IndexTable, IndexPagination };

export default createIndex;
