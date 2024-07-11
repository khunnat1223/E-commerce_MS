<script setup>
import { onMounted } from "vue";
import { initFlowbite } from "flowbite";
import Footer from "@/Pages/Footer.vue";
import Header from "@/Pages/Header.vue";

// initialize components based on data attribute selectors
onMounted(() => {
    initFlowbite();
});
</script>

<template>
    <div class="bg-white">
        <!-- hero - start -->
        <div class="bg-white">
            <Header></Header>
        </div>
        <!-- hero - end -->

        <div class="pt-6 bg-white pb-14">
            <div class="relative max-w-screen-lg px-4 mx-auto md:px-8">
                <div class="mb-6 sm:mb-10 lg:mb-16">
                    <h2
                        class="mb-4 text-2xl font-bold text-center text-gray-800 md:mb-6 lg:text-3xl"
                    >
                        Your Orders
                    </h2>
                </div>

                <div class="flex flex-col gap-2 mb-6 lg:mr-72 sm:mb-8 md:gap-2">
                    <!-- product - start -->
                    <div
                        class="flex flex-wrap mt-2 overflow-hidden rounded-lg gap-x-4 sm:gap-y-4 lg:gap-6 bg-slate-50"
                    >
                        <a
                            href="#"
                            class="relative block w-32 h-32 overflow-hidden bg-gray-100 group sm:h-40 sm:w-40"
                        >
                            <img
                                src="https://images.unsplash.com/photo-1542327897-4141b355e20e?auto=format&q=75&fit=crop&w=200"
                                loading="lazy"
                                alt="Photo by Jessica Radanavong"
                                class="object-cover object-center w-full h-full transition duration-200 group-hover:scale-110"
                            />
                        </a>

                        <div class="flex flex-col justify-between flex-1 py-4">
                            <div>
                                <a
                                    href="#"
                                    class="inline-block mb-1 text-lg font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-xl text-wrap"
                                    >Jacka</a
                                >
                                <span
                                    class="block pt-4 mb-1 font-bold text-gray-800 md:text-xl"
                                    >$65.00</span
                                >

                                <span
                                    class="flex items-center gap-1 text-sm text-gray-500"
                                >
                                    <span class="text-lg font-bold text-black"
                                        >100</span
                                    >
                                    Available in stock
                                </span>
                            </div>
                        </div>

                        <div
                            class="flex justify-between w-full p-4 border-t sm:w-auto sm:border-none sm:pl-0 lg:p-6 lg:pl-0"
                        >
                            <div class="flex flex-col items-center gap-2">
                                <div class="flex w-20 h-12 overflow-hidden">
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
                                </div>

                                <button
                                    class="p-2 text-sm font-semibold text-indigo-500 transition duration-100 rounded-lg select-none hover:text-indigo-600 active:text-indigo-700 hover:bg-slate-100"
                                >
                                    <svg
                                        fill="#545454"
                                        version="1.1"
                                        viewBox="144 144 512 512"
                                        xmlns="http://www.w3.org/2000/svg"
                                        stroke="#545454"
                                        class="w-8"
                                    >
                                        <g
                                            id="SVGRepo_bgCarrier"
                                            stroke-width="0"
                                        ></g>
                                        <g
                                            id="SVGRepo_tracerCarrier"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        ></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <g fill-rule="evenodd">
                                                <path
                                                    d="m552.15 317.14c0.31641-4.3438-1.1953-8.6484-4.1758-11.84-2.9805-3.1914-7.1602-5.0156-11.523-5.0156h-272.9c-4.3672 0-8.543 1.8281-11.523 5.0156-2.9805 3.1914-4.4922 7.4961-4.1758 11.84 0 0 12.492 174.97 18.199 254.91 2.1641 30.207 27.289 53.613 57.582 53.613h152.74c30.293 0 55.418-23.406 57.582-53.613 5.7109-79.938 18.199-254.91 18.199-254.91zm-32.602 14.633-17.004 238.03c-0.98828 13.73-12.406 24.371-26.176 24.371h-152.74c-13.77 0-25.191-10.645-26.176-24.371l-17.004-238.03z"
                                                ></path>
                                                <path
                                                    d="m557.44 331.77c8.6914 0 15.742-7.0547 15.742-15.742v-52.48c0-9.7422-3.8633-19.082-10.77-25.969-6.8867-6.9062-16.227-10.77-25.969-10.77h-272.9c-9.7422 0-19.082 3.8633-25.969 10.77-6.9062 6.8867-10.77 16.227-10.77 25.969v52.48c0 8.6914 7.0547 15.742 15.742 15.742zm-15.742-31.488h-283.39v-36.734c0-1.3867 0.54688-2.7305 1.5312-3.7148 0.98828-0.98828 2.332-1.5312 3.7148-1.5312h272.9c1.3867 0 2.7305 0.54687 3.7148 1.5312 0.98828 0.98828 1.5312 2.332 1.5312 3.7148v36.734z"
                                                ></path>
                                                <path
                                                    d="m473.47 258.3c4.2617 0 8.332-1.7227 11.293-4.7656 2.9609-3.0664 4.5781-7.1797 4.4492-11.441 0 0-0.50391-17.34-0.92188-32.074-0.56641-19.879-16.855-35.688-36.715-35.688h-103.16c-19.859 0-36.148 15.809-36.715 35.688-0.41797 14.738-0.92188 32.074-0.92188 32.074-0.125 4.2617 1.4922 8.375 4.4492 11.441 2.9609 3.043 7.0312 4.7656 11.293 4.7656zm-16.207-31.488h-114.53l0.46094-15.891c0.0625-2.832 2.3945-5.1016 5.2266-5.1016h103.16c2.832 0 5.1641 2.2656 5.2266 5.1016z"
                                                ></path>
                                                <path
                                                    d="m447.27 388.39-10.496 146.95c-0.62891 8.6484 5.918 16.207 14.59 16.816 8.6484 0.62891 16.207-5.918 16.816-14.59l10.496-146.95c0.62891-8.6484-5.918-16.207-14.59-16.816-8.6484-0.62891-16.207 5.918-16.816 14.59z"
                                                ></path>
                                                <path
                                                    d="m321.32 390.61 10.496 146.95c0.60938 8.668 8.1641 15.219 16.816 14.59 8.668-0.60938 15.219-8.1641 14.59-16.816l-10.496-146.95c-0.60937-8.668-8.1641-15.219-16.816-14.59-8.668 0.60938-15.219 8.1641-14.59 16.816z"
                                                ></path>
                                            </g>
                                        </g>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- product - end -->
                    <!-- product - start -->
                    <div
                        class="flex flex-wrap mt-2 overflow-hidden rounded-lg gap-x-4 sm:gap-y-4 lg:gap-6 bg-slate-50"
                    >
                        <a
                            href="#"
                            class="relative block w-32 h-32 overflow-hidden bg-gray-100 group sm:h-40 sm:w-40"
                        >
                            <img
                                src="https://images.unsplash.com/photo-1542327897-4141b355e20e?auto=format&q=75&fit=crop&w=200"
                                loading="lazy"
                                alt="Photo by Jessica Radanavong"
                                class="object-cover object-center w-full h-full transition duration-200 group-hover:scale-110"
                            />
                        </a>

                        <div class="flex flex-col justify-between flex-1 py-4">
                            <div>
                                <a
                                    href="#"
                                    class="inline-block mb-1 text-lg font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-xl text-wrap"
                                    >Jacka</a
                                >
                                <span
                                    class="block pt-4 mb-1 font-bold text-gray-800 md:text-xl"
                                    >$65.00</span
                                >

                                <span
                                    class="flex items-center gap-1 text-sm text-gray-500"
                                >
                                    <span class="text-lg font-bold text-black"
                                        >100</span
                                    >
                                    Available in stock
                                </span>
                            </div>
                        </div>

                        <div
                            class="flex justify-between w-full p-4 border-t sm:w-auto sm:border-none sm:pl-0 lg:p-6 lg:pl-0"
                        >
                            <div class="flex flex-col items-center gap-2">
                                <div class="flex w-20 h-12 overflow-hidden">
                                    <div class="relative flex items-center">
                                        <button
                                            type="button"
                                            id="decrement-button1"
                                            data-input-counter-decrement="counter-input1"
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
                                            id="counter-input1"
                                            data-input-counter
                                            class="flex-shrink-0 text-gray-900 dark:text-white border-0 bg-transparent text-sm font-normal focus:outline-none focus:ring-0 max-w-[2.5rem] text-center"
                                            placeholder=""
                                            value="1"
                                            required
                                        />
                                        <button
                                            type="button"
                                            id="increment-button1"
                                            data-input-counter-increment="counter-input1"
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
                                </div>

                                <button
                                    class="p-2 text-sm font-semibold text-indigo-500 transition duration-100 rounded-lg select-none hover:text-indigo-600 active:text-indigo-700 hover:bg-slate-100"
                                >
                                    <svg
                                        fill="#545454"
                                        version="1.1"
                                        viewBox="144 144 512 512"
                                        xmlns="http://www.w3.org/2000/svg"
                                        stroke="#545454"
                                        class="w-8"
                                    >
                                        <g
                                            id="SVGRepo_bgCarrier"
                                            stroke-width="0"
                                        ></g>
                                        <g
                                            id="SVGRepo_tracerCarrier"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        ></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <g fill-rule="evenodd">
                                                <path
                                                    d="m552.15 317.14c0.31641-4.3438-1.1953-8.6484-4.1758-11.84-2.9805-3.1914-7.1602-5.0156-11.523-5.0156h-272.9c-4.3672 0-8.543 1.8281-11.523 5.0156-2.9805 3.1914-4.4922 7.4961-4.1758 11.84 0 0 12.492 174.97 18.199 254.91 2.1641 30.207 27.289 53.613 57.582 53.613h152.74c30.293 0 55.418-23.406 57.582-53.613 5.7109-79.938 18.199-254.91 18.199-254.91zm-32.602 14.633-17.004 238.03c-0.98828 13.73-12.406 24.371-26.176 24.371h-152.74c-13.77 0-25.191-10.645-26.176-24.371l-17.004-238.03z"
                                                ></path>
                                                <path
                                                    d="m557.44 331.77c8.6914 0 15.742-7.0547 15.742-15.742v-52.48c0-9.7422-3.8633-19.082-10.77-25.969-6.8867-6.9062-16.227-10.77-25.969-10.77h-272.9c-9.7422 0-19.082 3.8633-25.969 10.77-6.9062 6.8867-10.77 16.227-10.77 25.969v52.48c0 8.6914 7.0547 15.742 15.742 15.742zm-15.742-31.488h-283.39v-36.734c0-1.3867 0.54688-2.7305 1.5312-3.7148 0.98828-0.98828 2.332-1.5312 3.7148-1.5312h272.9c1.3867 0 2.7305 0.54687 3.7148 1.5312 0.98828 0.98828 1.5312 2.332 1.5312 3.7148v36.734z"
                                                ></path>
                                                <path
                                                    d="m473.47 258.3c4.2617 0 8.332-1.7227 11.293-4.7656 2.9609-3.0664 4.5781-7.1797 4.4492-11.441 0 0-0.50391-17.34-0.92188-32.074-0.56641-19.879-16.855-35.688-36.715-35.688h-103.16c-19.859 0-36.148 15.809-36.715 35.688-0.41797 14.738-0.92188 32.074-0.92188 32.074-0.125 4.2617 1.4922 8.375 4.4492 11.441 2.9609 3.043 7.0312 4.7656 11.293 4.7656zm-16.207-31.488h-114.53l0.46094-15.891c0.0625-2.832 2.3945-5.1016 5.2266-5.1016h103.16c2.832 0 5.1641 2.2656 5.2266 5.1016z"
                                                ></path>
                                                <path
                                                    d="m447.27 388.39-10.496 146.95c-0.62891 8.6484 5.918 16.207 14.59 16.816 8.6484 0.62891 16.207-5.918 16.816-14.59l10.496-146.95c0.62891-8.6484-5.918-16.207-14.59-16.816-8.6484-0.62891-16.207 5.918-16.816 14.59z"
                                                ></path>
                                                <path
                                                    d="m321.32 390.61 10.496 146.95c0.60938 8.668 8.1641 15.219 16.816 14.59 8.668-0.60938 15.219-8.1641 14.59-16.816l-10.496-146.95c-0.60937-8.668-8.1641-15.219-16.816-14.59-8.668 0.60938-15.219 8.1641-14.59 16.816z"
                                                ></path>
                                            </g>
                                        </g>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- product - end -->
                </div>

                <!-- totals - start -->
                <div
                    class="flex flex-col items-end gap-4 lg:absolute top-28 end-4"
                >
                    <div class="p-4 bg-gray-100 rounded-lg w-72 sm:max-w-xs">
                        <div class="space-y-1">
                            <div
                                class="flex justify-between gap-4 text-gray-500"
                            >
                                <span>Subtotal</span>
                                <span>$129.99</span>
                            </div>

                            <div
                                class="flex justify-between gap-4 text-gray-500"
                            >
                                <span>Shipping</span>
                                <span>$4.99</span>
                            </div>
                        </div>

                        <div class="pt-4 mt-4 border-t">
                            <div
                                class="flex items-start justify-between gap-4 text-gray-800"
                            >
                                <span class="text-lg font-bold">Total</span>

                                <span class="flex flex-col items-end">
                                    <span class="text-lg font-bold"
                                        >$134.98 USD</span
                                    >
                                    <span class="text-sm text-gray-500"
                                        >including VAT</span
                                    >
                                </span>
                            </div>
                        </div>
                    </div>

                    <button
                        class="inline-block px-8 py-3 text-sm font-semibold text-center text-white transition duration-100 bg-yellow-500 rounded-lg outline-none ring-yellow-300 hover:bg-yellow-600 focus-visible:ring active:bg-yellow-700 md:text-base"
                    >
                        Check out
                    </button>
                </div>
                <!-- totals - end -->
            </div>
        </div>
        <div class="border-b lg:mx-48"></div>

        <div class="py-6 bg-white sm:py-8 lg:py-12">
            <div class="px-4 mx-auto max-w-screen-2xl md:px-8">
                <!-- text - start -->
                <div class="mb-10 md:mb-16">
                    <h2
                        class="mb-4 text-2xl font-bold text-center text-gray-800 md:mb-6 lg:text-3xl"
                    >
                        Add your address
                    </h2>
                </div>
                <!-- text - end -->

                <!-- form - start -->
                <form class="grid max-w-screen-md gap-4 mx-auto">
                    <div class="sm:col-span-2">
                        <label
                            for="message"
                            class="inline-block mb-2 text-sm text-gray-800 sm:text-base"
                            >Billing Address</label
                        >
                        <textarea
                            name="message"
                            class="w-full px-3 py-2 text-gray-800 transition duration-100 border rounded outline-none h-28 bg-gray-50 border-stone-200 focus:ring-yellow-500 focus:border-yellow-500"
                        ></textarea>
                    </div>

                    <div class="text-end sm:col-span-2">
                        <button
                            class="px-8 py-3 text-sm font-semibold text-center text-white transition duration-100 bg-yellow-500 rounded-lg outline-none ring-yellow-300 hover:bg-yellow-600 focus-visible:ring active:bg-yellow-700 md:text-base"
                        >
                            Add
                        </button>
                    </div>
                </form>
                <!-- form - end -->
            </div>
        </div>
        <Footer></Footer>
    </div>
</template>
