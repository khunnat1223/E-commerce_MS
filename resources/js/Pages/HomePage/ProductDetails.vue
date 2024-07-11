<script setup>
import { onMounted } from "vue";
import { initFlowbite } from "flowbite";
import Footer from "@/Pages/Footer.vue";
import Header from "@/Pages/Header.vue";
import FilterCategory from "@/Pages/FilterCategory.vue";
// initialize components based on data attribute selectors
onMounted(() => {
    initFlowbite();
});
</script>

<template>
    <div>
        <!-- hero - start -->
        <div class="bg-white">
            <Header></Header>

            <FilterCategory></FilterCategory>
        </div>
        <!-- hero - end -->

        <div class="py-6 bg-white sm:py-8 lg:py-12">
            <div class="max-w-screen-xl px-4 mx-auto md:px-40">
                <div class="grid gap-8 md:grid-cols-2">
                    <!-- images - start -->
                    <div class="grid gap-4 lg:grid-cols-5">
                        <div
                            class="flex order-last h-64 gap-4 lg:order-none lg:flex-col"
                        >
                            <div class="overflow-hidden bg-gray-100 rounded-lg">
                                <img
                                    src="https://images.unsplash.com/flagged/photo-1571366992791-2ad2078656cb?auto=format&q=75&fit=crop&w=250"
                                    loading="lazy"
                                    alt="Photo by Himanshu Dewangan"
                                    class="object-cover object-center w-full h-full"
                                />
                            </div>

                            <div class="overflow-hidden bg-gray-100 rounded-lg">
                                <img
                                    src="https://images.unsplash.com/flagged/photo-1571366992968-15b65708ee76?auto=format&q=75&fit=crop&w=250"
                                    loading="lazy"
                                    alt="Photo by Himanshu Dewangan"
                                    class="object-cover object-center w-full h-full"
                                />
                            </div>

                            <div class="overflow-hidden bg-gray-100 rounded-lg">
                                <img
                                    src="https://images.unsplash.com/flagged/photo-1571366992999-47669b775ef6?auto=format&q=75&fit=crop&w=250"
                                    loading="lazy"
                                    alt="Photo by Himanshu Dewangan"
                                    class="object-cover object-center w-full h-full"
                                />
                            </div>
                        </div>

                        <div
                            class="relative overflow-hidden rounded-lg h-80 lg:col-span-4"
                        >
                            <img
                                src="https://images.unsplash.com/flagged/photo-1571366992942-be878c7b10c0?auto=format&q=75&fit=crop&w=300"
                                loading="lazy"
                                alt="Photo by Himanshu Dewangan"
                                class="object-cover object-center w-full h-full"
                            />

                            <span
                                class="absolute left-0 top-0 rounded-br-lg bg-red-500 px-3 py-1.5 text-sm uppercase tracking-wider text-white"
                                >sale</span
                            >
                        </div>
                    </div>
                    <!-- images - end -->

                    <!-- content - start -->
                    <div class="md:py-8">
                        <!-- name - start -->
                        <div class="mb-2 md:mb-3">
                            <span class="mb-0.5 inline-block text-gray-500"
                                >Fancy Brand</span
                            >
                            <h2
                                class="text-2xl font-bold text-gray-800 lg:text-3xl"
                            >
                                Pullover with pattern
                            </h2>
                        </div>
                        <!-- name - end -->

                        <!-- price - start -->
                        <div class="mb-4">
                            <div class="flex items-end gap-2">
                                <span
                                    class="text-xl font-bold text-gray-800 md:text-2xl"
                                    >$15.00</span
                                >
                                <span class="mb-0.5 text-red-500 line-through"
                                    >$30.00</span
                                >
                            </div>

                            <span class="text-sm text-gray-500"
                                >Description</span
                            >

                            <form class="mt-2">
                                <label
                                    for="counter-input"
                                    class="block mb-1 text-sm font-bold text-gray-900 dark:text-white"
                                    >Choose quantity:</label
                                >
                                <div class="relative flex items-center">
                                    <button
                                        type="button"
                                        id="decrement-button"
                                        data-input-counter-decrement="counter-input"
                                        class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none"
                                    >
                                        <svg
                                            class="w-2.5 h-2.5 text-gray-900 dark:text-white"
                                            aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 18 2"
                                        >
                                            <path
                                                stroke="currentColor"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M1 1h16"
                                            />
                                        </svg>
                                    </button>
                                    <input
                                        type="text"
                                        id="counter-input"
                                        data-input-counter
                                        class="flex-shrink-0 text-gray-900 dark:text-white border-0 bg-transparent text-sm font-normal focus:outline-none focus:ring-0 max-w-[2.5rem] text-center"
                                        placeholder=""
                                        value="1"
                                        required
                                    />
                                    <button
                                        type="button"
                                        id="increment-button"
                                        data-input-counter-increment="counter-input"
                                        class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none"
                                    >
                                        <svg
                                            class="w-2.5 h-2.5 text-gray-900 dark:text-white"
                                            aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 18 18"
                                        >
                                            <path
                                                stroke="currentColor"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M9 1v16M1 9h16"
                                            />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!-- price - end -->

                        <!-- buttons - start -->
                        <div class="flex gap-2.5">
                            <a
                                href="#"
                                class="flex-1 inline-block px-8 py-3 text-sm font-semibold text-center text-white transition duration-100 bg-yellow-500 rounded-lg outline-none ring-indigo-300 hover:bg-yellow-600 focus-visible:ring active:bg-yellow-700 sm:flex-none md:text-base"
                                >Add to cart</a
                            >

                            <a
                                href="#"
                                class="inline-block px-8 py-3 text-sm font-semibold text-center text-gray-500 transition duration-100 bg-gray-200 rounded-lg outline-none ring-indigo-300 hover:bg-gray-300 focus-visible:ring active:text-gray-700 md:text-base"
                                >Buy now</a
                            >
                        </div>
                        <!-- buttons - end -->
                    </div>
                    <!-- content - end -->
                </div>
            </div>
        </div>
        <!-- grid product -->
        <div class="py-6 bg-white sm:py-8 lg:py-12">
            <div class="px-4 mx-auto max-w-screen-2xl md:px-8">
                <h1 class="pb-12 text-2xl font-bold">Products</h1>
                <div
                    class="grid gap-x-4 gap-y-8 sm:grid-cols-2 md:gap-x-6 lg:grid-cols-3 xl:grid-cols-4"
                >
                    <!-- product - start -->
                    <div>
                        <a
                            href="#"
                            class="relative block h-64 mb-2 overflow-hidden bg-gray-100 rounded-lg shadow-lg group lg:mb-3"
                        >
                            <img
                                src="https://images.unsplash.com/photo-1552374196-1ab2a1c593e8?auto=format&q=75&fit=crop&crop=top&w=600&h=700"
                                loading="lazy"
                                alt="Photo by Austin Wade"
                                class="object-cover object-center w-full h-full transition duration-200 group-hover:scale-110"
                            />

                            <div class="absolute left-0 flex gap-2 bottom-2">
                                <span
                                    class="rounded-r-lg bg-red-500 px-3 py-1.5 text-sm font-semibold uppercase tracking-wider text-white"
                                    >-50%</span
                                >
                                <span
                                    class="rounded-lg bg-white px-3 py-1.5 text-sm font-bold uppercase tracking-wider text-gray-800"
                                    >New</span
                                >
                            </div>
                        </a>

                        <div
                            class="flex items-start justify-between gap-2 px-2"
                        >
                            <div class="flex flex-col">
                                <a
                                    href="#"
                                    class="text-lg font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-xl"
                                    >Fancy Outfit</a
                                >
                                <span class="text-gray-500"
                                    >by Fancy Brand</span
                                >
                            </div>

                            <div class="flex flex-col items-end">
                                <span class="font-bold text-gray-600 lg:text-lg"
                                    >$19.99</span
                                >
                                <span class="text-sm text-red-500 line-through"
                                    >$39.99</span
                                >
                            </div>
                        </div>
                    </div>
                    <!-- product - end -->

                    <!-- product - start -->
                    <div>
                        <a
                            href="#"
                            class="relative block h-64 mb-2 overflow-hidden bg-gray-100 rounded-lg shadow-lg group lg:mb-3"
                        >
                            <img
                                src="https://images.unsplash.com/photo-1523359346063-d879354c0ea5?auto=format&q=75&fit=crop&crop=top&w=600&h=700"
                                loading="lazy"
                                alt="Photo by Nick Karvounis"
                                class="object-cover object-center w-full h-full transition duration-200 group-hover:scale-110"
                            />
                        </a>

                        <div
                            class="flex items-start justify-between gap-2 px-2"
                        >
                            <div class="flex flex-col">
                                <a
                                    href="#"
                                    class="text-lg font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-xl"
                                    >Cool Outfit</a
                                >
                                <span class="text-gray-500">by Cool Brand</span>
                            </div>

                            <div class="flex flex-col items-end">
                                <span class="font-bold text-gray-600 lg:text-lg"
                                    >$29.99</span
                                >
                            </div>
                        </div>
                    </div>
                    <!-- product - end -->

                    <!-- product - start -->
                    <div>
                        <a
                            href="#"
                            class="relative block h-64 mb-2 overflow-hidden bg-gray-100 rounded-lg shadow-lg group lg:mb-3"
                        >
                            <img
                                src="https://images.unsplash.com/photo-1548286978-f218023f8d18?auto=format&q=75&fit=crop&crop=top&w=600&h=700"
                                loading="lazy"
                                alt="Photo by Austin Wade"
                                class="object-cover object-center w-full h-full transition duration-200 group-hover:scale-110"
                            />
                        </a>

                        <div
                            class="flex items-start justify-between gap-2 px-2"
                        >
                            <div class="flex flex-col">
                                <a
                                    href="#"
                                    class="text-lg font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-xl"
                                    >Nice Outfit</a
                                >
                                <span class="text-gray-500">by Nice Brand</span>
                            </div>

                            <div class="flex flex-col items-end">
                                <span class="font-bold text-gray-600 lg:text-lg"
                                    >$35.00</span
                                >
                            </div>
                        </div>
                    </div>
                    <!-- product - end -->

                    <!-- product - start -->
                    <div>
                        <a
                            href="#"
                            class="relative block h-64 mb-2 overflow-hidden bg-gray-100 rounded-lg shadow-lg group lg:mb-3"
                        >
                            <img
                                src="https://images.unsplash.com/photo-1566207274740-0f8cf6b7d5a5?auto=format&q=75&fit=crop&crop=top&w=600&h=700"
                                loading="lazy"
                                alt="Photo by Vladimir Fedotov"
                                class="object-cover object-center w-full h-full transition duration-200 group-hover:scale-110"
                            />
                        </a>

                        <div
                            class="flex items-start justify-between gap-2 px-2"
                        >
                            <div class="flex flex-col">
                                <a
                                    href="#"
                                    class="text-lg font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-xl"
                                    >Lavish Outfit</a
                                >
                                <span class="text-gray-500"
                                    >by Lavish Brand</span
                                >
                            </div>

                            <div class="flex flex-col items-end">
                                <span class="font-bold text-gray-600 lg:text-lg"
                                    >$49.99</span
                                >
                            </div>
                        </div>
                    </div>
                    <!-- product - end -->
                </div>
            </div>
        </div>
        <Footer></Footer>
    </div>
</template>
