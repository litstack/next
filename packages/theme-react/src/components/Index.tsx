import {
    useIndex,
    IndexSearch,
    IndexTable,
    IndexPagination,
} from '@litstackjs/litstack-react';

function Index(props) {
    const table = useIndex(props);

    return (
        <div>
            <IndexSearch {...props} table={table} />
        </div>
    );
}

export default Index;
