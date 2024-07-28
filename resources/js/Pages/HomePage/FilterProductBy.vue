<script setup>
import { onMounted } from "vue";
import { initFlowbite } from "flowbite";

import HomeLayout from "@/Layouts/HomeLayout.vue";

onMounted(() => {
  initFlowbite();
});
import Products from "@/Pages/HomePage/Components/Products.vue";
import { ref } from "vue";
import { router, useForm } from "@inertiajs/vue3";
import { watch } from "vue";
import {
  Disclosure,
  DisclosureButton,
  DisclosurePanel,

} from "@headlessui/vue";
import { XMarkIcon } from "@heroicons/vue/24/outline";
import {
  ChevronDownIcon,
  FunnelIcon,
  MinusIcon,
  PlusIcon,
  Squares2X2Icon,
} from "@heroicons/vue/20/solid";

const filterPrices = useForm({
  prices: [0, 100000],
});

//method for price filter
const priceFilter = () => {
  filterPrices
    .transform((data) => ({
      ...data,
      prices: {
        from: filterPrices.prices[0],
        to: filterPrices.prices[1],
      },
    }))
    .get("products", {
      preserveState: true,
      replace: true,
    });
};

// const mobileFiltersOpen = ref(false)

const props = defineProps({
  products: Array,
  categories: Array,
});

//filter brands and categories
const selectedBrands = ref([]);
const selectedCategories = ref([]);

watch(selectedBrands, () => {
  updateFilteredProducts();
});
watch(selectedCategories, () => {
  updateFilteredProducts();
});

function updateFilteredProducts() {
  router.get(
    "products",
    {
      brands: selectedBrands.value,
      categories: selectedCategories.value,
    },
    {
      preserveState: true,
      replace: true,
    }
  );
}

const mobileFiltersOpen = ref(false);
</script>

<template>
  <HomeLayout>
    <div class="">
      <div>
        <main class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
          <div
            class="flex mt-10 items-baseline justify-between pb-6 border-b border-gray-200 dark:border-gray-600"
          >
            <h1
              class="font-khmer tracking-tight text-gray-900 md:text-xl dark:text-slate-100"
            >
              {{ $t("Filter Product") }}
            </h1>
            <div class="flex items-center">
              <button
                type="button"
                class="p-2 ml-4 -m-2 text-gray-400 hover:text-gray-500 sm:ml-6 lg:hidden"
                @click="mobileFiltersOpen = true"
              >
                <span class="sr-only">Filters</span>
                <FunnelIcon class="w-5 h-5" aria-hidden="true" />
              </button>
            </div>
          </div>
          <section aria-labelledby="products-heading" class="pt-6">
            <h2 id="products-heading" class="sr-only">Price</h2>

            <div class="flex">
              <!-- Filters -->
              <form class="hidden lg:block pr-10">
                <!-- price filter -->
                <div class="flex items-center justify-between space-x-3">
                  <div class="basis-1/2">
                    <label
                      for="filters-price-from"
                      class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                    >
                      {{ $t("From") }}
                    </label>
                    <div class="flex">
                      <input
                        type="number"
                        id="filters-price-from"
                        placeholder="Min price"
                        @mouseleave="priceFilter()"
                        v-model="filterPrices.prices[0]"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                      /><span class="mt-3 -ml-10">$</span>
                    </div>
                  </div>
                  <div class="basis-1/2">
                    <label
                      for="filters-price-to"
                      class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                    >
                      {{ $t("To") }}
                    </label>
                    <div class="flex">
                      <input
                        type="number"
                        id="filters-price-to"
                        v-model="filterPrices.prices[1]"
                        placeholder="Max price"
                        @mouseleave="priceFilter()"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                      />
                      <span class="mt-3 -ml-10">$</span>
                    </div>
                  </div>

                </div>

                <!-- end -->
                <!-- category filter -->

                <dev
                  as="div"
                  class="border-b border-gray-200 py-6"

                >
                  <h3 class="-my-3 flow-root mt-3">
                    <dev
                      class="flex w-full items-center justify-between py-3 text-sm text-gray-400  hover:text-gray-500"
                    >
                      <span class="font-medium border-t-2 w-full pt-2 text-gray-900 dark:text-white mb-2">{{
                        $t("Categories")
                      }}</span>
                    </dev>
                  </h3>
                  <dev class="pt-6 ">
                    <div class="space-y-4 ">
                      <div
                        v-for="category in categories"
                        :key="category.id"
                        class="flex items-center"
                      >
                        <input
                          :id="`filter-${category.id}`"
                          :value="category.id"
                          type="checkbox"
                          v-model="selectedCategories"
                          class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                        />
                        <label
                          :for="`filter-${category.id}`"
                          class="ml-3 text-sm dark:text-white "
                          >{{ category.category }}</label
                        >
                      </div>
                    </div>
                </dev>
                </dev>

                <!-- end -->
              </form>
              <!-- Product grid -->
              <div
                class="overflow-auto text-center bg-white dark:bg-gray-900 sm:py-8"
              >
                <!-- <Products :products="products"></Products> -->

                <Products :products="products"></Products>
              </div>
            </div>
          </section>
        </main>
      </div>
    </div>
  </HomeLayout>
</template>
