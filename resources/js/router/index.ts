import { createWebHistory, createRouter, Router } from "vue-router";
import Api from "./../common/api.service";
import { getQueryStringParams }  from "./../common/helpers";
import Page from "./../modules/page/Page.vue";

const router = createRouter({
    history: createWebHistory(),
    routes: [],
});

const visit = (page: object, path: string) => {
    let query = {};
    if(path == window.location.pathname) {
        query = getQueryStringParams(window.location.search);
    }
    router.addRoute({ path, component: Page, props: page});
    router.push({ path, query });
}

const navigateTo = (route: string) => {
    return Api.send('GET', route)
        .then((response: object) => {
            let path = new URL(route).pathname;
            visit(response, path);
        })
        .catch((error) => {
            
        });
}

export {
    router,
    navigateTo,
    visit
};

