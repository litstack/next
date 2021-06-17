module.exports = {
    mode: 'jit',
    purge: ['resources/**/*.vue'],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            gridTemplateColumns: {
                app: '300px 1fr',
            },
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
};
