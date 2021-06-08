import React from 'react';
import { Component } from '@litstackjs/litstack-react';

class BasePage extends React.Component {
	render() {
		return (
			<div>
				{this.props.components.map((component, i) => (
					<Component
						key={i}
						is={component.name}
						{...component.props}
					/>
				))}
			</div>
		);
	}
}

export default BasePage;
