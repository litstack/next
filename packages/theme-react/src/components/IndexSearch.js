import Input from './Input';

function IndexSearch(props) {
	return <Input value={props.search} onChange={props.updateSearch} />;
}

export default IndexSearch;
