<script setup>
// import { Link } from "@inertiajs/vue3";
// import { usePermission } from "@/composables/permission";
import { usePermission } from "@/composables/permission";
import NavLink from "@/Components/NavLink.vue";
const { hasRole, hasRoles } = usePermission();
import { Link, usePage } from "@inertiajs/vue3";
import { computed } from "vue";
const canLogin = usePage().props.canLogin;
const canRegister = usePage().props.canRegister;
const auth = usePage().props.auth;
const cart = computed(() => usePage().props.cart);

import { reactive } from "vue";
import { router } from "@inertiajs/vue3";
import { loadLanguageAsync } from "laravel-vue-i18n";

import { onMounted } from "vue";
import { initFlowbite } from "flowbite";
import { useDark, useToggle } from "@vueuse/core";

// initialize components based on data attribute selectors

// const { hasRole } = usePermission();
const isDark = useDark();
const toggleDark = useToggle(isDark);

onMounted(() => {
  initFlowbite();
});

const items = reactive({
  item: [
    { title: "English", value: "en" },
    { title: "ខ្មែរ", value: "kh" },
  ],
});

const changeLocale = (item) => {
  router.get(route("language", item.value));
  localStorage.getItem("lang", item.value);
  loadLanguageAsync(item.value);
};

// const cart = computed(() => usePage().props.cart);
</script>

<template>
  <header class="mb-8 h-16 bg-gray-800 -z-0">
    <div
      class="flex flex-wrap items-center justify-between px-4 mx-auto max-w-screen-2xl md:px-10"
    >
      <!-- logo - start -->
      <a
        href="/"
        class="inline-flex items-center gap-2.5 text-xl font-bold text-white md:text-3xl"
        aria-label="logo"
      >
        <img
          src="https://github.com/sa-sa-creator/Images/blob/main/RanyLogo.png?raw=true"
          class="w-14"
          alt=""
        />
        Rany Shop
      </a>

      <div class="hidden w-4/12 md:inline-block">
        <form class="max-w-md mx-auto">
          <div class="relative">
            <input
              type="search"
              id="default-search"
              class="w-full h-10 p-2 text-sm text-gray-900 border border-gray-300 rounded-lg ablock bg-gray-50 focus:ring-yellow-500 focus:border-yellow-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-yellow-500 dark:focus:border-yellow-500"
              placeholder="Search product..."
              required
            />
            <button
              type="submit"
              class="absolute px-4 py-2 text-sm font-medium text-white rounded-lg end-1 bottom-1 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-gray-200 dark:hover:bg-gray-200 dark:focus:ring-yellow-500"
            >
              <svg
                class="w-4 h-4 text-gray-500 dark:text-gray-400"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 20 20"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"
                />
              </svg>
            </button>
          </div>
        </form>
      </div>

      <div v-if="canLogin" class="flex gap-0 lg:flex 2xl:ml-16">
        <button
          id="cart"
          aria-expanded="false"
          data-dropdown-toggle="user-dropdown"
          data-dropdown-placement="bottom"
          class="flex h-10 w-10 pb-3 rounded-lg mt-3 flex-col items-center justify-center gap-1.5 transition duration-100 hover:bg-gray-500 active:bg-gray-200 dark:text-yellow-400 sm:h-10 sm:w-10 md:h-10 md:w-10"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="size-6 text-white"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"
            />
          </svg>

          <span
            class="-mt-10 ml-6 items-center justify-center w-auto px-1 text-xs font-bold text-white bg-red-500 border-2 border-red-500 rounded-full lg:top-6 lg:end-40 dark:border-gray-900 2xl:end-auto"
          >
            {{ cart.count }}
          </span>

          <!-- <span
                        class="hidden mt-3 text-xs font-semibold dark:text-yellow-400 text-white sm:block"
                        >Cart</span
                    > -->
        </button>
        <button
          @click="toggleDark()"
          type="button"
          class="text-sm text-white p-2 dark:text-yellow-400 dark:hover:bg-gray-700 hover:bg-gray-500 h-10 w-10 mt-3 rounded-lg"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="currentColor"
            class="w-6 h-6"
            v-if="isDark == false"
          >
            <path
              d="M12 2.25a.75.75 0 0 1 .75.75v2.25a.75.75 0 0 1-1.5 0V3a.75.75 0 0 1 .75-.75ZM7.5 12a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM18.894 6.166a.75.75 0 0 0-1.06-1.06l-1.591 1.59a.75.75 0 1 0 1.06 1.061l1.591-1.59ZM21.75 12a.75.75 0 0 1-.75.75h-2.25a.75.75 0 0 1 0-1.5H21a.75.75 0 0 1 .75.75ZM17.834 18.894a.75.75 0 0 0 1.06-1.06l-1.59-1.591a.75.75 0 1 0-1.061 1.06l1.59 1.591ZM12 18a.75.75 0 0 1 .75.75V21a.75.75 0 0 1-1.5 0v-2.25A.75.75 0 0 1 12 18ZM7.758 17.303a.75.75 0 0 0-1.061-1.06l-1.591 1.59a.75.75 0 0 0 1.06 1.061l1.591-1.59ZM6 12a.75.75 0 0 1-.75.75H3a.75.75 0 0 1 0-1.5h2.25A.75.75 0 0 1 6 12ZM6.697 7.757a.75.75 0 0 0 1.06-1.06l-1.59-1.591a.75.75 0 0 0-1.061 1.06l1.59 1.591Z"
            />
          </svg>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="currentColor"
            class="w-6 h-6"
            v-if="isDark == true"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z"
            />
          </svg>
        </button>
        <div
          class="cursor-pointer group flex text-sm hover:bg-hovercolorBG rounded-lg focus:ring-4"
          aria-expanded="false"
          data-dropdown-toggle="dropdown"
        >
          <button
            type="button"
            data-dropdown-toggle="language-dropdown-menu"
            class="text-sm text-white dark:text-yellow-400 hover:bg-gray-500 h-10 w-10 mt-3 pl-2 rounded-lg"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              fill="currentColor"
              class="w-6 h-6"
            >
              <path
                fill-rule="evenodd"
                d="M9 2.25a.75.75 0 0 1 .75.75v1.506a49.384 49.384 0 0 1 5.343.371.75.75 0 1 1-.186 1.489c-.66-.083-1.323-.151-1.99-.206a18.67 18.67 0 0 1-2.97 6.323c.318.384.65.753 1 1.107a.75.75 0 0 1-1.07 1.052A18.902 18.902 0 0 1 9 13.687a18.823 18.823 0 0 1-5.656 4.482.75.75 0 0 1-.688-1.333 17.323 17.323 0 0 0 5.396-4.353A18.72 18.72 0 0 1 5.89 8.598a.75.75 0 0 1 1.388-.568A17.21 17.21 0 0 0 9 11.224a17.168 17.168 0 0 0 2.391-5.165 48.04 48.04 0 0 0-8.298.307.75.75 0 0 1-.186-1.489 49.159 49.159 0 0 1 5.343-.371V3A.75.75 0 0 1 9 2.25ZM15.75 9a.75.75 0 0 1 .68.433l5.25 11.25a.75.75 0 1 1-1.36.634l-1.198-2.567h-6.744l-1.198 2.567a.75.75 0 0 1-1.36-.634l5.25-11.25A.75.75 0 0 1 15.75 9Zm-2.672 8.25h5.344l-2.672-5.726-2.672 5.726Z"
                clip-rule="evenodd"
              />
            </svg>
          </button>
          <!-- Dropdown -->
          <div
            class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700"
            id="language-dropdown-menu"
          >
            <ul class="py-2 font-medium" role="none">
              <li>
                <a
                  href="#"
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                  role="menuitem"
                  v-for="(item, index) in items.item"
                  :key="index"
                  @click="changeLocale(item)"
                >
                  <div class="inline-flex items-center">
                    <svg
                      aria-hidden="true"
                      class="w-4 h-4 rounded-full me-2"
                      xmlns="http://www.w3.org/2000/svg"
                      id="flag-icon-css-us"
                      viewBox="0 0 512 512"
                      v-if="item.title == `English`"
                    >
                      <g fill-rule="evenodd">
                        <g stroke-width="1pt">
                          <path
                            fill="#bd3d44"
                            d="M0 0h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0z"
                            transform="scale(3.9385)"
                          />
                          <path
                            fill="#fff"
                            d="M0 10h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0z"
                            transform="scale(3.9385)"
                          />
                        </g>
                        <path
                          fill="#192f5d"
                          d="M0 0h98.8v70H0z"
                          transform="scale(3.9385)"
                        />
                        <path
                          fill="#fff"
                          d="M8.2 3l1 2.8H12L9.7 7.5l.9 2.7-2.4-1.7L6 10.2l.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7L74 8.5l-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 7.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 24.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 21.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 38.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 35.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 52.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 49.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 66.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 63.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9z"
                          transform="scale(3.9385)"
                        />
                      </g>
                    </svg>
                    <svg
                      version="1.1"
                      id="Layer_1"
                      xmlns="http://www.w3.org/2000/svg"
                      xmlns:xlink="http://www.w3.org/1999/xlink"
                      viewBox="0 0 799.999 799.999"
                      xml:space="preserve"
                      fill="#000000"
                      class="w-4 h-4 me-2"
                      v-if="item.value == `kh`"
                    >
                      <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                      <g
                        id="SVGRepo_tracerCarrier"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      ></g>
                      <g id="SVGRepo_iconCarrier">
                        <g>
                          <path
                            style="fill: #103b9b"
                            d="M695.774,259.924v-1c0-6.563-5.34-11.903-11.903-11.903H24.807v-93.183h750.387v93.183h-39.709 c-6.563,0-11.903,5.34-11.903,11.903v1H695.774z"
                          ></path>
                          <rect
                            x="24.807"
                            y="552.978"
                            style="fill: #103b9b"
                            width="750.387"
                            height="93.183"
                          ></rect>
                          <path
                            style="fill: #ed1f34"
                            d="M24.807,529.171V270.827h659.064c6.563,0,11.903-5.34,11.903-11.903v-1h27.807v1 c0,6.563,5.34,11.903,11.903,11.903h39.709v258.344H24.807z M243.441,471.967c-6.563,0-11.903,5.34-11.903,11.903 s5.34,11.903,11.903,11.903H556.56c6.56,0,11.896-5.34,11.896-11.903s-5.34-11.903-11.902-11.903h-5.302v-71.538 c0-6.563-5.34-11.903-11.903-11.903h-10.635l-0.198-0.742c-6-22.507-26.365-34.104-27.229-34.586 c-1.771-0.99-3.778-1.513-5.808-1.513s-4.037,0.523-5.807,1.513c-0.864,0.483-21.236,12.106-27.229,34.586l-0.198,0.742h-7.105 l-0.102-0.886c-5.97-52.02-46.626-80.185-48.354-81.358c-1.98-1.347-4.293-2.058-6.688-2.058s-4.707,0.711-6.687,2.058 c-1.728,1.175-42.389,29.371-48.354,81.358l-0.102,0.886h-7.105l-0.198-0.742c-5.997-22.494-26.365-34.104-27.229-34.586 c-1.77-0.99-3.778-1.513-5.807-1.513s-4.037,0.523-5.806,1.513c-0.864,0.483-21.237,12.106-27.23,34.586l-0.198,0.742h-10.635 c-6.563,0-11.903,5.34-11.903,11.903v71.538H243.441z"
                          ></path>
                          <path
                            style="fill: #103b9b"
                            d="M683.871,246.02c7.128,0,12.903,5.775,12.903,12.903h25.807c0-7.128,5.775-12.903,12.903-12.903 h38.709v-91.183H25.807v91.183L683.871,246.02L683.871,246.02z"
                          ></path>
                          <rect
                            x="25.807"
                            y="553.978"
                            style="fill: #103b9b"
                            width="748.387"
                            height="91.183"
                          ></rect>
                          <path
                            style="fill: #ed1f34"
                            d="M683.871,271.827H25.807v256.344h748.387V271.827h-38.709c-7.128,0-12.903-5.775-12.903-12.903 h-25.807C696.774,266.052,690.999,271.827,683.871,271.827z M556.56,496.773H243.441c-7.128,0-12.903-5.775-12.903-12.903 s5.775-12.903,12.903-12.903h4.301v-70.538c0-7.128,5.775-12.903,12.903-12.903h9.867c6.094-22.857,26.688-34.63,27.708-35.202 c3.91-2.187,8.679-2.187,12.59,0c1.021,0.571,21.613,12.344,27.707,35.202h5.445c6.017-52.43,46.915-80.8,48.785-82.071 c4.375-2.975,10.124-2.975,14.499,0c1.872,1.271,42.769,29.641,48.785,82.071h5.445c6.094-22.857,26.687-34.63,27.707-35.202 c3.91-2.187,8.68-2.187,12.59,0c1.022,0.571,21.614,12.344,27.708,35.202h9.866c7.128,0,12.903,5.775,12.903,12.903v70.538h4.302 c7.127,0,12.902,5.775,12.902,12.903S563.687,496.773,556.56,496.773z"
                          ></path>
                          <path
                            d="M787.097,129.031H12.903C5.775,129.031,0,134.807,0,141.935v516.129c0,7.128,5.775,12.903,12.903,12.903h774.193 c7.128,0,12.903-5.775,12.903-12.903V141.935C800,134.807,794.225,129.031,787.097,129.031z M774.193,154.838v91.183h-38.709 c-7.128,0-12.903,5.775-12.903,12.903s5.775,12.903,12.903,12.903h38.709v256.344H25.807V271.827h658.064 c7.128,0,12.903-5.775,12.903-12.903s-5.775-12.903-12.903-12.903H25.807v-91.183L774.193,154.838L774.193,154.838z M25.807,645.16 v-91.183h748.387v91.183H25.807z"
                          ></path>
                          <path
                            style="fill: #ffffff"
                            d="M526.451,470.967v-57.634h-8.182c-7.117,0-12.892-5.764-12.903-12.881 c-0.018-9.291-5.334-16.344-9.865-20.673c-4.54,4.341-9.882,11.415-9.899,20.673c-0.012,7.12-5.785,12.881-12.903,12.881H443.87 c-7.124,0-12.898-5.771-12.903-12.896c-0.022-34.36-19.852-57.435-30.968-67.671c-11.099,10.219-30.941,33.299-30.964,67.671 c-0.005,7.124-5.779,12.896-12.903,12.896h-28.829c-7.118,0-12.892-5.764-12.903-12.881c-0.018-9.291-5.334-16.344-9.865-20.673 c-4.54,4.341-9.882,11.415-9.899,20.673c-0.012,7.12-5.786,12.881-12.903,12.881h-8.183v57.634H526.451z"
                          ></path>
                          <path
                            d="M556.56,470.967h-4.302v-70.538c0-7.128-5.775-12.903-12.903-12.903h-9.866c-6.094-22.857-26.688-34.63-27.708-35.202 c-3.91-2.187-8.679-2.187-12.59,0c-1.021,0.571-21.613,12.344-27.707,35.202h-5.445c-6.017-52.43-46.915-80.8-48.785-82.071 c-4.375-2.975-10.124-2.975-14.499,0c-1.872,1.271-42.769,29.641-48.785,82.071h-5.445c-6.094-22.857-26.687-34.63-27.707-35.202 c-3.91-2.187-8.68-2.187-12.59,0c-1.022,0.571-21.614,12.344-27.708,35.202h-9.874c-7.127,0-12.903,5.775-12.903,12.903v70.538 h-4.301c-7.128,0-12.903,5.775-12.903,12.903s5.775,12.903,12.903,12.903H556.56c7.127,0,12.903-5.775,12.903-12.903 S563.687,470.967,556.56,470.967z M281.731,413.333c7.117,0,12.891-5.764,12.903-12.881c0.018-9.258,5.359-16.331,9.899-20.673 c4.533,4.329,9.85,11.381,9.865,20.673c0.012,7.12,5.785,12.881,12.903,12.881h28.829c7.124,0,12.898-5.771,12.903-12.896 c0.022-34.372,19.865-57.452,30.964-67.671c11.116,10.236,30.945,33.311,30.968,67.671c0.005,7.124,5.779,12.896,12.903,12.896 h28.829c7.118,0,12.892-5.764,12.903-12.881c0.018-9.258,5.359-16.331,9.899-20.673c4.533,4.329,9.85,11.381,9.865,20.673 c0.012,7.12,5.786,12.881,12.903,12.881h8.182v57.634H273.548v-57.634H281.731z"
                          ></path>
                        </g>
                      </g>
                    </svg>
                    {{ item.title }}
                  </div>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <button
          type="button"
          id="user-menu-button"
          aria-expanded="false"
          data-dropdown-toggle="user-dropdown"
          data-dropdown-placement="bottom"
        ></button>

        <div>
          <div v-if="auth.user" class="flex">
            <button
              id="user-menu-button"
              aria-expanded="false"
              data-dropdown-toggle="user-dropdown"
              data-dropdown-placement="bottom"
              class="flex rounded-lg mt-3 flex-col items-center justify-center gap-1.5 transition duration-100 hover:bg-gray-500 active:bg-gray-200 sm:h-10 sm:w-10 md:h-10 md:w-10"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="w-6 h-6 text-white dark:text-yellow-400"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                />
              </svg>

              <!-- <span
                        class="hidden text-xs font-semibold text-white dark:text-yellow-400 sm:block"
                        >Account</span
                    > -->
            </button>
            <span class="pt-5">
              <Link
                v-if="hasRole('admin')"
                :href="route('admin.index')"
                :active="route().current('admin.index')"
                class="text-white"
              >
                <div
                  class="hover:bg-gray-600 w-10 h-10 pl-2 pt-2 -mt-2 rounded-lg"
                >
                  <svg
                    class="w-6 h-6 text-white dark:text-yellow-400 dark:hover:text-yellow-300"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M9 15a6 6 0 1 1 12 0 6 6 0 0 1-12 0Zm3.845-1.855a2.4 2.4 0 0 1 1.2-1.226 1 1 0 0 1 1.992-.026c.426.15.809.408 1.111.749a1 1 0 1 1-1.496 1.327.682.682 0 0 0-.36-.213.997.997 0 0 1-.113-.032.4.4 0 0 0-.394.074.93.93 0 0 0 .455.254 2.914 2.914 0 0 1 1.504.9c.373.433.669 1.092.464 1.823a.996.996 0 0 1-.046.129c-.226.519-.627.94-1.132 1.192a1 1 0 0 1-1.956.093 2.68 2.68 0 0 1-1.227-.798 1 1 0 1 1 1.506-1.315.682.682 0 0 0 .363.216c.038.009.075.02.111.032a.4.4 0 0 0 .395-.074.93.93 0 0 0-.455-.254 2.91 2.91 0 0 1-1.503-.9c-.375-.433-.666-1.089-.466-1.817a.994.994 0 0 1 .047-.134Zm1.884.573.003.008c-.003-.005-.003-.008-.003-.008Zm.55 2.613s-.002-.002-.003-.007a.032.032 0 0 1 .003.007ZM4 14a1 1 0 0 1 1 1v4a1 1 0 1 1-2 0v-4a1 1 0 0 1 1-1Zm3-2a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0v-6a1 1 0 0 1 1-1Zm6.5-8a1 1 0 0 1 1-1H18a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0v-.796l-2.341 2.049a1 1 0 0 1-1.24.06l-2.894-2.066L6.614 9.29a1 1 0 1 1-1.228-1.578l4.5-3.5a1 1 0 0 1 1.195-.025l2.856 2.04L15.34 5h-.84a1 1 0 0 1-1-1Z"
                      clip-rule="evenodd"
                    />
                  </svg>
                </div>
              </Link>
              <NavLink
                v-if="hasRoles(['staff', 'view'])"
                :href="route('categorys.index')"
                :active="route().current('categorys.index')"
                class="pr-2"
              >
                Dashboard
              </NavLink>
              <NavLink
                v-if="hasRole('view')"
                :href="route('admin.index')"
                :active="route().current('admin.index')"
                class="pr-2"
              >
                Viewer
              </NavLink>
            </span>
          </div>
          <div v-else class="mt-4 ml-3">
            <Link
              :href="route('login')"
              type="button"
              class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-7 py-2 text-center mr-2 mb-2"
            >
              Login</Link
            >
            <Link
              :href="route('register')"
              v-if="canRegister"
              type="button"
              class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-7 py-2 text-center mr-2 mb-2"
            >
              Register</Link
            >
          </div>
        </div>

        <!-- Dropdown menu -->
        <div
          class="z-50 hidden my-4 text-base list-none divide-y divide-gray-100 rounded-lg shadow bg-slate-100 dark:bg-gray-700 dark:divide-gray-600"
          id="user-dropdown"
        >
          <div class="px-4 py-3">
            <span class="block text-sm text-gray-900 dark:text-white"
              >jdsf</span
            >
            <span
              class="block text-sm text-gray-500 truncate dark:text-gray-400"
              >name@flowbite.com</span
            >
          </div>
          <ul class="py-2" aria-labelledby="user-menu-button">
            <li>
              <a
                href="#"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                >Profile</a
              >
            </li>
            <li>
              <a
                href="#"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                >History</a
              >
            </li>
            <li>
              <a
                href="#"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                >Earnings</a
              >
            </li>
            <li>
              <Link
                :href="route('logout')"
                method="post"
                as="button"
                class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-6 w-6"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                  />
                </svg>
                <span class="group-hover:text-gray-700">Logout</span>
              </Link>
            </li>
          </ul>
        </div>
      </div>

      <!-- buttons - end -->
    </div>
  </header>
</template>
