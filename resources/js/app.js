require("./bootstrap");

import Vue from "vue";
import App from "./App.vue";
import VueRouter from "vue-router";
import routes from "./routes";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes,
});

router.beforeEach((to, from, next) => {
    const allowedRoutes = ["/products", "/products/create"];

    if (allowedRoutes.includes(to.path)) {
        next(); // Allow navigation
    } else {
        next("/products"); // Redirect to /products if route is not allowed
    }
});

const app = new Vue({
    el: "#app",
    router,
    render: (h) => h(App),
});
