import React from 'react';
import { Component } from '@litstackjs/litstack-react';
import { Component as TComponent } from '@litstackjs/litstack';

class BasePage extends React.Component<{ components: TComponent[] }> {
	render() {
		return (
			<div>
				{this.props.components.map((component, i) => (
					<Component
						key={i}
						name={component.name}
						props={component.props}
					/>
				))}
			</div>
		);
	}
}

export default BasePage;
