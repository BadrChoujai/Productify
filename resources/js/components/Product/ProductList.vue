<template>
    <div>
        <div class="bg-white">
            <div
                v-if="products && products.length"
                class="mx-auto max-w-full px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-16"
            >
                <button
                    class="px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-black rounded-lg hover:bg-gray-800 focus:outline-none"
                >
                    <router-link to="/products/create">
                        New Product
                    </router-link>
                </button>
                <div class="flex justify-between items-center my-4">
                    <h1 class="text-2xl text-black">
                        Products ({{ products.length }})
                    </h1>
                    <div class="card col-lg-3 mb-4" id="filter">
                        <!-- ... Previous filters code ... -->
                        <h3 class="mt-2">Price Range</h3>
                        <div class="flex-row space-x-2">
                            <input
                                type="number"
                                class="form-control"
                                placeholder="Min Price"
                                v-model="selected.minPrice"
                            />
                            <input
                                type="number"
                                class="form-control"
                                placeholder="Max Price"
                                v-model="selected.maxPrice"
                            />
                        </div>
                    </div>
                    <button
                        class="px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-800 rounded-lg hover:bg-gray-800 focus:outline-none"
                        id="filters"
                        @click="loadFilteredProducts()"
                    >
                        Filter
                    </button>
                    <button
                        class="px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-gray-600 rounded-lg hover:bg-gray-800 focus:outline-none"
                        id="filters"
                        @click="reset()"
                    >
                        Reset filter
                    </button>
                </div>

                <div
                    class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8"
                >
                    <div
                        v-for="(product, index) in products"
                        :key="index"
                        class="card border p-4 rounded-lg"
                    >
                        <div class="card-body">
                            <div
                                class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7"
                            >
                                <img
                                    :src="product.image"
                                    :alt="product.name"
                                    class="h-full w-full object-cover object-center group-hover:opacity-75"
                                />
                            </div>
                            <h3 class="mt-4 text-sm text-gray-700">
                                {{ product.name }}
                            </h3>
                            <p class="mt-1 text-lg font-medium text-gray-900">
                                {{ product.price }} MAD
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else><Loading /></div>
        </div>
    </div>
</template>

<script>
import instance from "../../HttpInstance";
import Loading from "../Core/Loading.vue";

export default {
    components: {
        Loading,
    },
    data() {
        return {
            products: null,
            categories: null,
            selected: {
                minPrice: null,
                maxPrice: null,
            },
        };
    },
    mounted() {
        this.getProducts();
    },

    methods: {
        loadFilteredProducts() {
            this.getProducts({ ...this.selected });
        },
        getProducts(filters = null) {
            instance
                .get(`/api/products`, { params: filters })
                .then(({ status, data }) => {
                    if (status !== 200) {
                        return;
                    }

                    this.products = data.data;
                })
                .catch((error) => {
                    console.log(error);
                })
                .finally(() => {});
        },
        reset() {
            this.getProducts();
            this.selected.minPrice = null;
            this.selected.maxPrice = null;
        },
    },
};
</script>
