<script setup>
import { ref } from "vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Head } from "@inertiajs/vue3";
import { Link, useForm } from "@inertiajs/vue3";
import { usePermission } from "@/composables/permission";
// import { usePage } from '@inertiajs/inertia-vue3';
import { router } from "@inertiajs/vue3";

import Table from "@/Components/Table.vue";
import TableRow from "@/Components/TableRow.vue";
import TableHeaderCell from "@/Components/TableHeaderCell.vue";
import TableDataCell from "@/Components/TableDataCell.vue";

import moment from "moment";

defineProps({
    products: Array,
});

const i = 1;

const formatDate = (date) => {
  return moment(date).format("DD/MMM/YYYY");
};
const formatNumber = (number) => {
  return number.toString().padStart(4, "0");
};

const form = useForm({});
const OrderId = ref("");

const { hasPermission } = usePermission();


</script>

<template>
  <AdminLayout>
    <div class="px-4 dark:bg-slate-900">
      <div class="flex justify-between pb-4">
        <!-- Path for Back -->
        <div class="text-md font-sans cursor-pointer flex">
          <div
            class="flex hover:text-yellow-700 dark:hover:text-yellow-500 dark:text-gray-200"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="w-6 h-5 mt-1"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"
              />
            </svg>

            <span class="m-1">
              <a :href="route('admin.index')" :active="false">
                <span class="font-sans">{{ $t("dashbourd") }}</span>
              </a>
            </span>
          </div>

          <div
            class="flex hover:text-yellow-700 dark:hover:text-yellow-500 dark:text-gray-200"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              fill="currentColor"
              class="w-5 h-5 mt-1"
            >
              <path
                fill-rule="evenodd"
                d="M13.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L11.69 12 4.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                clip-rule="evenodd"
              />
              <path
                fill-rule="evenodd"
                d="M19.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 1 1-1.06-1.06L17.69 12l-6.97-6.97a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                clip-rule="evenodd"
              />
            </svg>
            <span class="m-1">
              <Link :href="route('products.index')" :active="false">
                <span class="font-sans">{{ $t("Product") }}</span>
              </Link>
            </span>
          </div>
        </div>

        <Link
          v-if="hasPermission('Create Product')"
          :href="route('products.create')"
          class="middle none center rounded-lg hover:scale-110 hover:skew-y-3 border-2 border-yellow-600 py-2 px-6 font-sans text-sm text-yellow-600 shadow-md transition-all hover:shadow-lg hover:shadow-yellow-700"
          data-ripple-light="true"
        >
          {{ $t("Create") }}
        </Link>
      </div>
      <div class="shadow-md bg-gray-200 rounded-md p-5">
        <h1 class="text-2xl mb-4">{{ $t("Product") }}/ {{ $t("Detail") }}</h1>
        <div class="flex justify-between">
          <div>
            <div class="flex mb-2">
              <h1 class="font-bold text-lg mr-2">{{ $t("Product Name") }} :</h1>
              <p class="text-lg">{{ products.title }}</p>
            </div>
            <div class="flex mb-2">
              <h1 class="font-bold text-lg mr-2">{{ $t("Category") }} :</h1>
              <p class="text-lg">{{ products.category_id }}</p>
            </div>
            <div class="flex mb-2">
              <h1 class="font-bold text-lg mr-2">{{ $t("Cost") }} :</h1>
              <p class="text-lg">{{ products.cost }}</p>
            </div>
            <div class="flex mb-2">
              <h1 class="font-bold text-lg mr-2">{{ $t("Selling") }} :</h1>
              <p class="text-lg">{{ products.sellingprice }}</p>
            </div>
            <div class="flex mb-2">
              <h1 class="font-bold text-lg mr-2">{{ $t("Discount") }} :</h1>
              <p class="text-lg">{{ products.discount }}</p>
            </div>
            <div class="flex mb-2">
              <h1 class="font-bold text-lg mr-2">{{ $t("Selling Price") }} :</h1>
              <p class="text-lg">{{ products.price }}</p>
            </div>
            <div class="flex mb-2">
              <h1 class="font-bold text-lg mr-2">{{ $t("Quantity") }} :</h1>
              <p class="text-lg">{{ products.qty }}</p>
            </div>
            <div class="flex mb-2">
              <h1 class="font-bold text-lg mr-2">{{ $t("Total") }} :</h1>
              <p class="text-lg">{{ products.total_cost }}</p>
            </div>
            <div class="flex mb-2">
              <h1 class="font-bold text-lg mr-2">{{ $t("Total Price") }} :</h1>
              <p class="text-lg">{{ products.total_price }}</p>
            </div>
            <div class="flex mb-2">
              <h1 class="font-bold text-lg mr-2">{{ $t("Status") }} :</h1>
              <p class="text-lg" v-if="products.inStock ==0 ">
                {{$t('StockIn')}}
              </p>
              <p class="text-lg" v-else>
                {{ $t('StockOut') }}
              </p>
            </div>
            <div class="flex mb-2">
              <h1 class="font-bold text-lg mr-2">{{ $t("Published") }} :</h1>
              <p class="text-lg" v-if="products.published == 0 ">
                {{$t('Unpublish')}}
              </p>
              <p class="text-lg" v-else>
                {{$t('Published')}}
              </p>
            </div>
            <div class="flex mb-2">
              <h1 class="font-bold text-lg mr-2">{{ $t("Supplier Name") }} :</h1>
              <p class="text-lg">{{ products.supplier_id }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AdminLayout>
</template>
