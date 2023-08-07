<template>
    <div class="flex justify-center mt-4 mb-4 items-center w-full h-full">
        <section class="w-full h-full p-6 mx-16 bg-white rounded-md shadow-md">
            <router-link to="/products"
                ><span class="text-lg">Go Back</span></router-link
            >
            <h2 class="text-lg font-semibold text-gray-700 capitalize mt-8">
                New Product
            </h2>

            <div>
                <div class="flex-row gap-6 mt-4">
                    <div class="mt-4">
                        <label class="text-gray-700">Name</label>
                        <input
                            required
                            id="username"
                            v-model="product.name"
                            type="text"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                        />
                    </div>

                    <div class="mt-4">
                        <label class="text-gray-800">Price (MAD)</label>
                        <input
                            required
                            id="price"
                            v-model="product.price"
                            type="number"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                        />
                    </div>

                    <div class="mt-4">
                        <label class="text-gray-700">Description</label>
                        <textarea
                            v-model="product.description"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                        ></textarea>
                    </div>

                    <div class="mt-4">
                        <label class="text-gray-800">Upload Image</label>
                        <input
                            required
                            id="product_image"
                            type="file"
                            @change="handleImageChange"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                        />
                    </div>

                    <div class="mt-4" v-if="categories && categories.length">
                        <label class="text-gray-800 mb-2">Categories:</label>
                        <select
                            class="w-full h-1/2"
                            multiple
                            v-model="product.selectedCats"
                        >
                            <option
                                v-for="(category, index) in categories"
                                :key="index"
                                :value="category.id"
                            >
                                {{ category.name }}
                            </option>
                        </select>
                    </div>
                </div>

                <div class="flex justify-end mt-6">
                    <button
                        @click="saveProduct"
                        class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600"
                    >
                        Save
                    </button>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import instance from "../../HttpInstance";

export default {
    data() {
        return {
            categories: null,
            product: {
                name: "",
                price: 0,
                description: "",
                image: null,
                selectedCats: [],
            },
            res: "",
        };
    },
    components: {},
    mounted() {
        this.getCategories();
    },
    methods: {
        saveProduct() {
            var formData = new FormData();
            formData.append("image", this.product.image);
            formData.append("price", this.product.price);
            formData.append("name", this.product.name);
            formData.append("description", this.product.description);
            formData.append("selectedCats", this.product.selectedCats);

            instance
                .post("/api/products", formData, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                    },
                })
                .then(({ status, data }) => {
                    if (status !== 200) {
                        return;
                    }

                    this.res = data;
                    this.$router.push("/products");
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        getCategories() {
            instance
                .get(`/api/categories`)
                .then(({ status, data }) => {
                    if (status !== 200) {
                        return;
                    }

                    this.categories = data.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        handleImageChange(event) {
            const selectedFile = event.target.files[0];

            if (selectedFile) {
                this.product.image = selectedFile;
            }
        },
    },
};
</script>
