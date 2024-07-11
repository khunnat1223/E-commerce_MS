<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import FilterCategory from "@/Layouts/FilterCategory.vue";
import Carousel from "@/Pages/Carousel.vue";




defineProps({
    products: Array,
});
</script>

<template>
    <HomeLayout>
        <div class="pb-4">
            <FilterCategory></FilterCategory>
        </div>
        <!-- product-grid - start -->
        <div class="pb-6 text-center sm:pb-8 lg:pb-12">
            <div class="px-4 mx-auto max-w-screen-2xl md:px-8 text-start">
                <Carousel></Carousel>
                <h6 class="pt-4 pb-10 text-2xl font-bold dark:text-white">
                    All Products
                </h6>
                <div
                    class="grid gap-x-4 gap-y-8 sm:grid-cols-2 md:gap-x-6 lg:grid-cols-3 xl:grid-cols-4"
                >
                    <!-- product - start -->
                    <div v-for="product in products" :key="product.id">
                        <a
                            href="#"
                            class="relative block h-64 mb-2 overflow-hidden bg-gray-100 rounded-lg shadow-lg group lg:mb-3"
                        >
                            <img
                                v-if="product.product_images.length > 0"
                                :src="`/${product.product_images[0].filename}`"
                                loading="lazy"
                                alt="Photo by Austin Wade"
                                class="object-cover object-center w-full h-full transition duration-200 group-hover:scale-110"
                            />
                            <img
                                v-else
                                src="https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg"
                                loading="lazy"
                                alt="Photo by Austin Wade"
                                class="object-cover object-center w-full h-full transition duration-200 group-hover:scale-110"
                            />
                            <div class="absolute left-0 flex gap-2 bottom-2">
                                <span
                                    class="rounded-r-lg bg-red-500 px-3 py-1.5 text-sm font-semibold uppercase tracking-wider text-white"
                                    >-50%</span
                                >
                                <!-- <span
                                    class="rounded-lg bg-white px-3 py-1.5 text-sm font-bold uppercase tracking-wider text-gray-800"
                                    >New</span
                                > -->
                            </div>
                        </a>

                        <div
                            class="flex items-start justify-between gap-2 px-2"
                        >
                            <div class="flex flex-col">
                                <a
                                    href="#"
                                    class="text-lg font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-xl dark:text-slate-100"
                                    >{{ product.name }}</a
                                >
                                <span
                                    class="text-gray-500 dark:text-slate-300"
                                    >{{ product.category.name }}</span
                                >
                            </div>

                            <div class="flex flex-col items-end">
                                <span
                                    class="font-bold text-gray-600 lg:text-lg dark:text-slate-100"
                                    >${{ product.price }}</span
                                >
                                <span class="text-sm text-red-500 line-through"
                                    >$39.99</span
                                >
                            </div>
                        </div>
                    </div>
                    <!-- product - end -->
                </div>
            </div>
            <!-- pagination -->
             
            <nav aria-label="Page navigation example">
                <ul class="inline-flex pt-12 -space-x-px text-sm">
                    <li>
                        <a
                            href="#"
                            class="flex items-center justify-center h-8 px-3 leading-tight text-gray-500 bg-white border border-gray-100 ms-0 border-e-0 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                            >Previous</a
                        >
                    </li>
                    <li>
                        <a
                            href="#"
                            class="flex items-center justify-center h-8 px-3 leading-tight text-gray-500 bg-white border border-gray-100 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                            >1</a
                        >
                    </li>
                    <li>
                        <a
                            href="#"
                            class="flex items-center justify-center h-8 px-3 leading-tight text-gray-500 bg-white border border-gray-100 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                            >2</a
                        >
                    </li>
                    <li>
                        <a
                            href="#"
                            aria-current="page"
                            class="flex items-center justify-center h-8 px-3 text-blue-600 border border-gray-100 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white"
                            >3</a
                        >
                    </li>
                    <li>
                        <a
                            href="#"
                            class="flex items-center justify-center h-8 px-3 leading-tight text-gray-500 bg-white border border-gray-100 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                            >4</a
                        >
                    </li>
                    <li>
                        <a
                            href="#"
                            class="flex items-center justify-center h-8 px-3 leading-tight text-gray-500 bg-white border border-gray-100 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                            >5</a
                        >
                    </li>
                    <li>
                        <a
                            href="#"
                            class="flex items-center justify-center h-8 px-3 leading-tight text-gray-500 bg-white border border-gray-100 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                            >Next</a
                        >
                    </li>
                </ul>
            </nav>
        </div>
        <!-- product-grid - end -->
    </HomeLayout>
</template>
