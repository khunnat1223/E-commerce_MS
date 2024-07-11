<script>
import HomeLayout from "@/Layouts/HomeLayout.vue";
export default {
    components: {
        HomeLayout,
    },
    data() {
        return {
            image: document.getElementById("productImage"),
            smallImages: document.getElementsByClassName("small-images"),
        };
    },
    methods: {},
};
</script>

<template>
    <HomeLayout>
        <div class="py-6 sm:py-8 lg:py-12 dark:bg-slate-900">
            <div class="max-w-screen-xl px-4 mx-auto md:px-40">
                <div class="grid gap-8 md:grid-cols-2">
                    <!-- images - start -->
                    <div class="grid gap-4 lg:grid-cols-5">
                        <div
                            class="flex order-last h-64 gap-4 lg:order-none lg:flex-col small-images"
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
                                id="productImage"
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
                            <span
                                class="mb-0.5 inline-block text-gray-500 dark:text-slate-400"
                                >Fancy Brand</span
                            >
                            <h2
                                class="text-2xl font-bold text-gray-800 lg:text-3xl dark:text-slate-50"
                            >
                                Pullover with pattern
                            </h2>
                        </div>
                        <!-- name - end -->

                        <!-- price - start -->
                        <div class="mb-4">
                            <div class="flex items-end gap-2">
                                <span
                                    class="text-xl font-bold text-gray-800 md:text-2xl dark:text-slate-100"
                                    >$15.00</span
                                >
                                <span class="mb-0.5 text-red-500 line-through"
                                    >$30.00</span
                                >
                            </div>

                            <span
                                class="text-sm text-gray-500 dark:text-slate-400"
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
                                class="inline-block px-8 py-3 text-sm font-semibold text-center text-gray-500 transition duration-100 bg-gray-200 rounded-lg outline-none ring-indigo-300 hover:bg-gray-300 focus-visible:ring active:text-gray-700 md:text-base dark:bg-slate-200"
                                >Buy now</a
                            >
                        </div>
                        <!-- buttons - end -->
                    </div>
                    <!-- content - end -->
                </div>
            </div>
        </div>
    </HomeLayout>
</template>
