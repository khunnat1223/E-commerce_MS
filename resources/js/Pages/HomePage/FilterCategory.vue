<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <!-- filter categories -->
    <div class="flex flex-wrap items-center justify-center -mt-16 -mb-10">
        <button
            type="button"
            class="text-yellow-700 hover:text-white border border-yellow-600 bg-white hover:bg-yellow-700 focus:ring-4 focus:outline-none focus:ring-yellow-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:border-yellow-500 dark:text-yellow-500 dark:hover:text-white dark:hover:bg-yellow-500 dark:bg-gray-700 dark:focus:ring-yellow-800"
        >
            {{$t('All categories')}}
        </button>
       <Link
            type="button"
            :href="route('productList.index')"
            class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-700 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800"
        >
            {{$t('Filter Products')}}
        </Link>

    </div>
</template>
