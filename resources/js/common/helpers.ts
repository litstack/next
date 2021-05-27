const url = require('url');

const getQueryStringParams = (query: string):object => {
    return query !== ''
        ? (/^[?#]/.test(query) ? query.slice(1) : query)
            .split('&')
            .reduce((params, param) => {
                    let [key, value] = param.split('=');
                    params[key] = value ? decodeURIComponent(value.replace(/\+/g, ' ')) : '';
                    return params;
                }, {}
            )
        : {};
};

const updateQueryString = (url_string: string, params: object): string => {
    const parsed = url.parse(url_string, true);
    parsed.search = String(new URLSearchParams(
        Object.assign(parsed.query, params)
    ));
    
    return url.format(parsed);
  };




export {
    updateQueryString,
    getQueryStringParams
}