import React from 'react';
import { render } from 'react-dom';
import { App } from '@inertiajs/inertia-react';
import { InertiaProgress } from '@inertiajs/progress';
import { use } from '@litstackjs/litstack-react';
import { plugin as LitstackTheme } from '@litstackjs/theme-react';

const el = document.getElementById('app');

render(
    <App
        initialPage={JSON.parse(el.dataset.page)}
        resolveComponent={(name) => require(`./Pages/${name}`).default}
    />,
    el
);

use(LitstackTheme);

InertiaProgress.init();
