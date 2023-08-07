import ProductList from "../js/components/Product/ProductList.vue";
import ProductCreate from "../js/components/Product/ProductCreate.vue";

export default [
    { name: "products.index", path: "/products", component: ProductList },
    {
        name: "products.create",
        path: "/products/create",
        component: ProductCreate,
    },
];
