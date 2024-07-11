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

        <div>
            <div class="flex flex-col items-center py-10">
                <img
                    class="rounded-full shadow-lg w-44 h-44 bg-slate-100"
                    src="https://github.com/sa-sa-creator/Images/blob/main/2.jpg?raw=true"
                    alt="Bonnie image"
                />
            </div>
        </div>
        <div class="py-4 bg-white sm:py-8">
            <div class="px-4 pl-4 mx-auto max-w-screen-2xl md:pl-8">
                <div class="grid max-w-screen-md mx-auto">
                    <u class="pb-4 text-xl font-bold"> Personal Information </u>
                    <div class="flex px-4 py-2">
                        <br /><strong>Name: </strong>
                        <p>&ensp;Meas Sarith</p>
                    </div>
                    <div class="flex px-4 py-2">
                        <br /><strong>Email: </strong>
                        <p>&ensp; sarithlovekh@gmail.com</p>
                    </div>
                    <div class="flex px-4 py-2">
                        <br /><strong>Phone Number: </strong>
                        <p>&ensp; 010371277</p>
                    </div>
                    <div class="flex px-4 py-2">
                        <br /><strong>Address: </strong>
                        <p>
                            &ensp; Romchek 5 village,Sangkat Rattanak, Krong
                            Battambang, Battambang Provice
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="pt-12 border-b lg:mx-48"></div>
        <!-- change Personal Information -->
        <div class="py-6 bg-white sm:py-8 lg:py-12">
            <div class="px-4 mx-auto max-w-screen-2xl md:px-8">
                <!-- text - start -->
                <div class="mb-10 md:mb-16">
                    <h2
                        class="pt-8 mb-4 text-2xl font-bold text-center text-gray-800 md:mb-6 lg:text-3xl"
                    >
                        Change Your Personal Information
                    </h2>
                </div>
                <!-- text - end -->

                <!-- form - start -->
                <form class="grid max-w-screen-md gap-4 mx-auto">
                    <div class="sm:col-span-2">
                        <label
                            for="subject"
                            class="inline-block mb-2 text-sm text-gray-800 sm:text-base"
                            >Name</label
                        >
                        <input
                            name="subject"
                            class="w-full px-3 py-2 text-gray-800 transition duration-100 border rounded outline-none bg-gray-50 border-stone-200 focus:ring-yellow-500 focus:border-yellow-500"
                        />
                    </div>
                    <div class="sm:col-span-2">
                        <label
                            for="subject"
                            class="inline-block mb-2 text-sm text-gray-800 sm:text-base"
                            >Phone Number</label
                        >
                        <input
                            name="subject"
                            class="w-full px-3 py-2 text-gray-800 transition duration-100 border rounded outline-none bg-gray-50 border-stone-200 focus:ring-yellow-500 focus:border-yellow-500"
                        />
                    </div>
                    <div class="sm:col-span-2">
                        <label
                            for="message"
                            class="inline-block mb-2 text-sm text-gray-800 sm:text-base"
                            >Address</label
                        >
                        <textarea
                            name="message"
                            class="w-full px-3 py-2 text-gray-800 transition duration-100 border rounded outline-none h-28 bg-gray-50 border-stone-200 focus:ring-yellow-500 focus:border-yellow-500"
                        ></textarea>
                    </div>

                    <div class="text-end sm:col-span-2">
                        <button
                            class="flex px-8 py-3 text-sm font-semibold text-center text-white transition duration-100 bg-yellow-500 rounded-lg outline-none ring-yellow-300 hover:bg-yellow-600 focus-visible:ring active:bg-yellow-700 md:text-base"
                        >
                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                                stroke="#ffffff"
                                class="w-8 pr-2"
                            >
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g
                                    id="SVGRepo_tracerCarrier"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                ></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z"
                                        stroke="#ffffff"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    ></path>
                                    <path
                                        d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13"
                                        stroke="#ffffff"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    ></path>
                                </g>
                            </svg>
                            Update
                        </button>
                    </div>
                </form>
                <!-- form - end -->
            </div>
        </div>
        <!-- change Your Password -->
        <div class="pt-12 border-b lg:mx-48"></div>
        <div class="py-6 bg-white sm:py-8 lg:py-12">
            <div class="px-4 mx-auto max-w-screen-2xl md:px-8">
                <!-- text - start -->
                <div class="mb-10 md:mb-16">
                    <h2
                        class="pt-8 mb-4 text-2xl font-bold text-center text-gray-800 md:mb-6 lg:text-3xl"
                    >
                        Change Your Password
                    </h2>
                </div>
                <!-- text - end -->

                <!-- form - start -->
                <form class="grid max-w-screen-md gap-4 mx-auto">
                    <div class="sm:col-span-2">
                        <label
                            for="subject"
                            class="inline-block mb-2 text-sm text-gray-800 sm:text-base"
                            >Current Password</label
                        >
                        <input
                            name="subject"
                            type="password"
                            class="w-full px-3 py-2 text-gray-800 transition duration-100 border rounded outline-none bg-gray-50 border-stone-200 focus:ring-yellow-500 focus:border-yellow-500"
                        />
                    </div>
                    <div class="sm:col-span-2">
                        <label
                            for="subject"
                            class="inline-block mb-2 text-sm text-gray-800 sm:text-base"
                            >New Password</label
                        >
                        <input
                            name="subject"
                            type="password"
                            class="w-full px-3 py-2 text-gray-800 transition duration-100 border rounded outline-none bg-gray-50 border-stone-200 focus:ring-yellow-500 focus:border-yellow-500"
                        />
                    </div>
                    <div class="sm:col-span-2">
                        <label
                            for="subject"
                            class="inline-block mb-2 text-sm text-gray-800 sm:text-base"
                            >Confirm Password</label
                        >
                        <input
                            name="subject"
                            type="password"
                            class="w-full px-3 py-2 text-gray-800 transition duration-100 border rounded outline-none bg-gray-50 border-stone-200 focus:ring-yellow-500 focus:border-yellow-500"
                        />
                    </div>

                    <div class="text-end sm:col-span-2">
                        <button
                            class="flex px-8 py-3 text-sm font-semibold text-center text-white transition duration-100 bg-yellow-500 rounded-lg outline-none ring-yellow-300 hover:bg-yellow-600 focus-visible:ring active:bg-yellow-700 md:text-base"
                        >
                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                                stroke="#ffffff"
                                class="w-8 pr-2"
                            >
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g
                                    id="SVGRepo_tracerCarrier"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                ></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z"
                                        stroke="#ffffff"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    ></path>
                                    <path
                                        d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13"
                                        stroke="#ffffff"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    ></path>
                                </g>
                            </svg>
                            Update
                        </button>
                    </div>
                </form>
                <!-- form - end -->
            </div>
        </div>
        <!-- change Your Profile -->
        <div class="pt-12 border-b lg:mx-48"></div>
        <div class="py-6 bg-white sm:py-8 lg:py-12">
            <div class="px-4 mx-auto max-w-screen-2xl md:px-8">
                <!-- text - start -->
                <div class="pt-8 mb-10 md:mb-16">
                    <h2
                        class="mb-4 text-2xl font-bold text-center text-gray-800 md:mb-6 lg:text-3xl"
                    >
                        Change Your Profile
                    </h2>
                </div>
                <!-- text - end -->

                <!-- form - start -->
                <form class="max-w-screen-md gap-4 mx-auto">
                    <div class="flex items-center justify-center w-full py-4">
                        <label
                            for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600"
                        >
                            <div
                                class="flex flex-col items-center justify-center pt-5 pb-6"
                            >
                                <svg
                                    class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 20 16"
                                >
                                    <path
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"
                                    />
                                </svg>
                                <p
                                    class="mb-2 text-sm text-gray-500 dark:text-gray-400"
                                >
                                    <span class="font-semibold"
                                        >Click to upload</span
                                    >
                                    or drag and drop
                                </p>
                                <p
                                    class="text-xs text-gray-500 dark:text-gray-400"
                                >
                                    SVG, PNG, JPG or GIF (MAX. 800x400px)
                                </p>
                            </div>
                            <input
                                id="dropzone-file"
                                type="file"
                                class="hidden"
                            />
                        </label>
                    </div>

                    <div class="text-end sm:col-span-2">
                        <button
                            class="flex px-8 py-3 text-sm font-semibold text-center text-white transition duration-100 bg-yellow-500 rounded-lg outline-none ring-yellow-300 hover:bg-yellow-600 focus-visible:ring active:bg-yellow-700 md:text-base"
                        >
                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                                stroke="#ffffff"
                                class="w-8 pr-2"
                            >
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g
                                    id="SVGRepo_tracerCarrier"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                ></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z"
                                        stroke="#ffffff"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    ></path>
                                    <path
                                        d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13"
                                        stroke="#ffffff"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    ></path>
                                </g>
                            </svg>
                            Update
                        </button>
                    </div>
                </form>
                <!-- form - end -->
            </div>
        </div>
        <Footer></Footer>
    </div>
</template>
