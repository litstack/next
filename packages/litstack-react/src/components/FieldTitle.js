const FieldTitle = (props) => {
    if (!props.hasTitle) {
        return;
    }

    const Tag = props.titleTag || 'h5';

    return <Tag dangerouslySetInnerHTML={{ __html: props.title }} />;
};

export default FieldTitle;
