import React from 'react';
import pickBy from 'lodash.pickby';

let components = {};

const addComponent = (name, component) => {
    components[name] = component;
};

const use = (module) => {
    module.install(addComponent);
};

const Component = (props, context) => {
    if (!(props.is in components)) {
        throw new Error(
            `No dynamic component with name [${props.is}] registered.`
        );
    }

    const Component = components[props.is];

    let passthru = pickBy(props, (value, key) => !['is', 'key'].includes(key));

    return <Component {...passthru} />;
};

export { addComponent, Component, use };
