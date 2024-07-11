<script setup>
import { onMounted } from "vue";
import { initFlowbite } from "flowbite";
import SecondaryButton from "@/Components/SecondaryButton.vue";

import HomeLayout from "@/Layouts/HomeLayout.vue";

onMounted(() => {
  initFlowbite();
});
import Products from "@/Pages/HomePage/Components/Products.vue";
import { ref } from "vue";
import SecondaryButtonVue from "@/Components/SecondaryButton.vue";
import { router, useForm } from "@inertiajs/vue3";
import {  watch } from 'vue';
import {
  Dialog,
  DialogPanel,
  Disclosure,
  DisclosureButton,
  DisclosurePanel,
  Menu,
  MenuButton,
  MenuItem,
  MenuItems,
  TransitionChild,
  TransitionRoot,
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
    categories: Array
})

const sortOptions = [
  { name: "Most Popular", href: "#", current: true },
  { name: "Best Rating", href: "#", current: false },
  { name: "Newest", href: "#", current: false },
  { name: "Price: Low to High", href: "#", current: false },
  { name: "Price: High to Low", href: "#", current: false },
];

// const filters = [
//   {
//     id: "category",
//     name: "Category",
//     options: [
//       { value: "new-arrivals", label: "New Arrivals", checked: false },
//       { value: "sale", label: "Sale", checked: false },
//       { value: "travel", label: "Travel", checked: true },
//       { value: "organization", label: "Organization", checked: false },
//       { value: "accessories", label: "Accessories", checked: false },
//     ],
//   },
// ];

//filter brands and categories
const selectedBrands = ref([])
const selectedCategories = ref([])

watch(selectedBrands, () => {
    updateFilteredProducts()
})
watch(selectedCategories, () => {
    updateFilteredProducts()
})

function updateFilteredProducts() {
    router.get('products', {
        brands: selectedBrands.value,
        categories: selectedCategories.value
    }, {
        preserveState: true,
        replace: true
    })
}

const mobileFiltersOpen = ref(false);
</script>

<template>
  <HomeLayout>
    <div class="">
      <div>
        <!-- Mobile filter dialog -->
        <TransitionRoot as="template" :show="mobileFiltersOpen">
          <Dialog
            class="relative z-40 lg:hidden"
            @close="mobileFiltersOpen = false"
          >
            <TransitionChild
              as="template"
              enter="transition-opacity ease-linear duration-300"
              enter-from="opacity-0"
              enter-to="opacity-100"
              leave="transition-opacity ease-linear duration-300"
              leave-from="opacity-100"
              leave-to="opacity-0"
            >
              <div class="fixed inset-0 bg-black bg-opacity-25" />
            </TransitionChild>

            <div class="fixed inset-0 z-40 flex">
              <TransitionChild
                as="template"
                enter="transition ease-in-out duration-300 transform"
                enter-from="translate-x-full"
                enter-to="translate-x-0"
                leave="transition ease-in-out duration-300 transform"
                leave-from="translate-x-0"
                leave-to="translate-x-full"
              >
                <DialogPanel
                  class="relative flex flex-col w-full h-full max-w-xs py-4 pb-12 ml-auto overflow-y-auto bg-white shadow-xl dark:bg-slate-500"
                >
                  <div class="flex items-center justify-between px-4">
                    <h2
                      class="text-lg font-medium text-gray-900 dark:text-slate-100"
                    >
                      Filters
                    </h2>
                    <button
                      type="button"
                      class="flex items-center justify-center w-10 h-10 p-2 -mr-2 text-gray-400 rounded-md dark:text-slate-100"
                      @click="mobileFiltersOpen = false"
                    >
                      <span class="sr-only">Close menu</span>
                      <XMarkIcon class="w-6 h-6" aria-hidden="true" />
                    </button>
                  </div>

                  <!-- Filters -->
                  <form class="mt-4 border-t border-gray-400">
                    <h3 class="sr-only dark:text-slate-100">Categories</h3>
                    <ul
                      role="list"
                      class="px-2 py-3 font-medium text-gray-900 dark:text-slate-300"
                    >
                      <li
                        v-for="category in categories"
                        :key="category.category"
                      >
                        <a :href="category.href" class="block px-2 py-3">{{
                          category.category
                        }}</a>
                      </li>
                    </ul>

                    <Disclosure
                      as="div"
                      v-for="section in filters"
                      :key="section.id"
                      class="px-4 py-6 border-t border-gray-400"
                      v-slot="{ open }"
                    >
                      <h3 class="flow-root -mx-2 -my-3">
                        <DisclosureButton
                          class="flex items-center justify-between w-full px-2 py-3 text-gray-400 hover:text-gray-500"
                        >
                          <span
                            class="font-medium text-gray-900 dark:text-slate-200"
                            >{{ section.name }}</span
                          >
                          <span class="flex items-center ml-6">
                            <PlusIcon
                              v-if="!open"
                              class="w-5 h-5"
                              aria-hidden="true"
                            />
                            <MinusIcon
                              v-else
                              class="w-5 h-5"
                              aria-hidden="true"
                            />
                          </span>
                        </DisclosureButton>
                      </h3>
                      <DisclosurePanel class="pt-6">
                        <div class="space-y-6">
                          <div
                            v-for="(option, optionIdx) in section.options"
                            :key="option.value"
                            class="flex items-center"
                          >
                            <input
                              :id="`filter-mobile-${section.id}-${optionIdx}`"
                              :name="`${section.id}[]`"
                              :value="option.value"
                              type="checkbox"
                              :checked="option.checked"
                              class="w-4 h-4 text-yellow-600 border-gray-300 rounded focus:ring-yellow-500"
                            />
                            <label
                              :for="`filter-mobile-${section.id}-${optionIdx}`"
                              class="flex-1 min-w-0 ml-3 text-gray-500 dark:text-slate-300"
                              >{{ option.label }}</label
                            >
                          </div>
                        </div>
                      </DisclosurePanel>
                    </Disclosure>
                  </form>
                </DialogPanel>
              </TransitionChild>
            </div>
          </Dialog>
        </TransitionRoot>

        <main class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
          <div
            class="flex items-baseline justify-between pb-6 border-b border-gray-200 dark:border-gray-600"
          >
            <h1
              class="text-lg font-bold tracking-tight text-gray-900 md:text-4xl dark:text-slate-100"
            >
              Filter Product
            </h1>
            <div class="flex items-center">
              <Menu as="div" class="relative inline-block text-left">
                <div>
                  <MenuButton
                    class="inline-flex justify-center text-sm font-medium text-gray-500 dark:text-slate-100 hover:text-gray-500"
                  >
                    Sort
                    <ChevronDownIcon
                      class="flex-shrink-0 w-5 h-5 ml-1 -mr-1 text-gray-400 hover:text-gray-500 dark:text-slate-100"
                      aria-hidden="true"
                    />
                  </MenuButton>
                </div>
                <transition
                  enter-active-class="transition duration-100 ease-out"
                  enter-from-class="transform scale-95 opacity-0"
                  enter-to-class="transform scale-100 opacity-100"
                  leave-active-class="transition duration-75 ease-in"
                  leave-from-class="transform scale-100 opacity-100"
                  leave-to-class="transform scale-95 opacity-0"
                >
                  <MenuItems
                    class="absolute right-0 z-10 w-40 mt-2 origin-top-right bg-white rounded-md shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none dark:bg-slate-700"
                  >

                  </MenuItems>
                </transition>
              </Menu>
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
                      From
                    </label>

                    <input
                      type="number"
                      id="filters-price-from"
                      placeholder="Min price"
                       @mouseleave="priceFilter()"
                      v-model="filterPrices.prices[0]"
                      class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                    />
                  </div>
                  <div class="basis-1/2">
                    <label
                      for="filters-price-to"
                      class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                    >
                      To
                    </label>
                    <input
                      type="number"
                      id="filters-price-to"
                      v-model="filterPrices.prices[1]"
                      placeholder="Max price"
                      @mouseleave="priceFilter()"
                      class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                    />
                  </div>
                  <!-- <SecondaryButton class="self-end" @click="priceFilter()">
                    Ok
                  </SecondaryButton> -->
                </div>

                <!-- end -->
                 <!-- category filter -->

                 <Disclosure as="div" class="border-b border-gray-200 py-6" v-slot="{ open }">
                                    <h3 class="-my-3 flow-root">
                                        <DisclosureButton
                                            class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500">
                                            <span class="font-medium text-gray-900">Categories</span>
                                            <span class="ml-6 flex items-center">
                                                <PlusIcon v-if="!open" class="h-5 w-5" aria-hidden="true" />
                                                <MinusIcon v-else class="h-5 w-5" aria-hidden="true" />
                                            </span>
                                        </DisclosureButton>
                                    </h3>
                                    <DisclosurePanel class="pt-6">
                                        <div class="space-y-4">
                                            <div v-for="category in categories" :key="category.id"
                                                class="flex items-center">
                                                <input :id="`filter-${category.id}`" :value="category.id" type="checkbox"
                                                    v-model="selectedCategories"
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                                <label :for="`filter-${category.id}`" class="ml-3 text-sm text-gray-600">{{
                                                    category.category }}</label>
                                            </div>
                                        </div>
                                    </DisclosurePanel>
                                </Disclosure>

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
