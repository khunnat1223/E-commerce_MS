<script setup>
// import { router } from '@inertiajs/vue3';
import PaginationLink from "@/Components/PaginationLink.vue";
// import Link from 'vendor/protonemedia/laravel-splade/lib/Components/Link.vue';
import { Link, router } from "@inertiajs/vue3";
defineProps({
    products: Array
})

const addToCart = (product) => {
    console.log(product);
    router.post(route('cart.store', product), {
        onSuccess: (page) => {
            if (page.props.flash.success) {
                Swal.fire({
                    toast: true,
                    icon: "success",
                    position: "top-end",
                    showConfirmButton: false,
                    title: page.props.flash.success
                });
            }
        },
    });
}

</script>

<template>
<div class="px-4 mx-auto max-w-screen-2xl md:px-8 text-start">
    <!-- <h6 class="pb-10 text-2xl font-bold dark:text-white text-gray-800">
        All Products
    </h6> -->
    <div class="grid gap-x-4 gap-y-8 sm:grid-cols-2 md:gap-x-6 lg:grid-cols-3 xl:grid-cols-4">
        <div v-for="product in products.data" :key="product.id">
            <a href="#" class="block h-64 mb-2 overflow-hidden rounded-lg shadow-lg dark:shadow-gray-700 group relative">
                <img
                    v-if="product.product_images.length > 0"
                    :src="`/${product.product_images[0].image}`"
                    loading="lazy"
                    alt="Product Image"
                    class="object-cover object-center w-full h-full transition duration-200 group-hover:scale-110"
                />
                <img
                    v-else
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/1665px-No-Image-Placeholder.svg.png"
                    loading="lazy"
                    alt="No Image Available"
                    class="object-cover object-center w-full h-full transition duration-200 hover:scale-110"
                />
                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 cursor-pointer">
                    <div class="bg-yellow-700 opacity-80 p-2 rounded-full ml-2">
                        <Link :href="route('productDetail.show', product.id)">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6 text-white"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"
                                />
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                />
                            </svg>
                        </Link>
                    </div>
                </div>
                <div class="left-0 -mt-10 flex gap-2 bottom-2">
                    <span v-if="product.discount > 0 " class="rounded-r-lg bg-red-500 px-3 py-1.5 text-sm font-semibold uppercase tracking-wider text-white">{{ product.discount }}%</span>
                    <span class="rounded-lg bg-white px-3 py-1.5 text-sm font-bold uppercase tracking-wider text-gray-800">New</span>
                </div>
            </a>
            <div class="flex items-start justify-between gap-2 px-2">
                <div class="flex flex-col">
                    <a href="#" class="text-lg font-bold text-gray-800 transition duration-100 hover:text-gray-500 dark:text-white lg:text-xl">{{ product.title }}</a>
                    <span class="text-gray-500 dark:text-white truncate w-24">{{ product.description }}</span>
                </div>
                <div class="flex flex-col items-end">
                    <button @click="addToCart(product)" class="p-2 rounded-full cursor-pointer hover:bg-yellow-100">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-6 h-6 text-gray-600 lg:text-lg dark:text-white hover:scale-105"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"
                            />
                        </svg>
                    </button>
                    <span class="font-bold text-gray-600 lg:text-lg dark:text-white">{{ product.price }}$</span>
                    <span class="text-sm text-red-500 line-through">{{ product.sellingprice }}$</span>
                </div>
            </div>
        </div>
    </div>
    <div class="pr-4">
             <!-- pagination -->
              <!-- <PaginationLink :paginator="products"/> -->
        </div>
</div>
</template>
