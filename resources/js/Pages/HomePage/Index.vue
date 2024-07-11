<script setup>
import { onMounted } from "vue";
import { initFlowbite } from "flowbite";
import FilterCategory from "@/Pages/HomePage/FilterCategory.vue";
import { Link, router } from "@inertiajs/vue3";
import HomeLayout from "@/Layouts/HomeLayout.vue";
import Products from "@/Pages/HomePage/Components/Products.vue";
import PaginationLink from "@/Components/PaginationLink.vue";

onMounted(() => {
  initFlowbite();
});

const props = defineProps({
  banners: Array,
  products: Object,
});
console.log(props.products);

const fetchItems = (url) => {
  router.visit(url, {
    preserveState: true,
    preserveScroll: true,
  });
};
</script>


<template>
  <div>
    <HomeLayout>
      <div class="mt-20">
        <FilterCategory></FilterCategory>
      </div>
      <!-- Banner -->
      <div class="mx-24 mt-14">
        <div id="default-carousel" class="relative w-full" data-carousel="slide">
      <!-- Carousel wrapper -->
      <div class="relative h-56 overflow-hidden rounded-lg md:h-96" >
        <!-- Item 1 -->
        <div class="hidden duration-1000 ease-in-out" data-carousel-item  v-for="banner in banners" :key="banner.id">
            <img
                    v-if="banner.image.length > 0"
                    :src="banner.image"
                    loading="lazy"
                    class="object-cover object-center w-full h-full transition duration-200 group-hover:scale-110"
                />
                <img
                    v-else
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/1665px-No-Image-Placeholder.svg.png"
                    loading="lazy"
                    alt="No Image Available"
                    class="object-cover object-center w-full h-full transition duration-200 hover:scale-110"
                />
        </div>
      </div>
      <!-- Slider controls -->
      <button
        type="button"
        class="absolute top-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer start-2 group focus:outline-none"
        data-carousel-prev
      >
        <span
          class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none"
        >
          <svg
            class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 6 10"
          >
            <path
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M5 1 1 5l4 4"
            />
          </svg>
          <span class="sr-only">Previous</span>
        </span>
      </button>
      <button
        type="button"
        class="absolute top-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer end-2 group focus:outline-none"
        data-carousel-next
      >
        <span
          class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none"
        >
          <svg
            class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 6 10"
          >
            <path
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="m1 9 4-4-4-4"
            />
          </svg>
          <span class="sr-only">Next</span>
        </span>
      </button>
    </div>
      </div>
      <h6 class="pt-16 pb-5 ml-10 text-2xl font-bold dark:text-white">
         All Products
      </h6>
      <!-- product-grid - start -->
      <div class="py-6 text-center bg-white dark:bg-gray-900 sm:py-8 lg:pb-12">
        <Products :products="products"></Products>
        <!-- end -->
        <div class="flex justify-center mt-5">

          <!-- <Link
            :href="route('productList.index')"
            class="text-white bg-yellow-600 hover:bg-yellow-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
          >
            View All Products
          </Link> -->
        </div>


      </div>
    </HomeLayout>
    <!-- product-grid - end -->
  </div>
</template>
