import {
    createIndex,
    IndexSearch,
    IndexTable,
    IndexPagination,
} from '@litstackjs/litstack-react';

function Index(props) {
    const table = createIndex(props);

    return (
        <div>
            <IndexSearch {...props} {...table} />
        </div>
    );
}

export default Index;
