<script setup>
import { ref } from "vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Head } from "@inertiajs/vue3";
import { Link, useForm } from "@inertiajs/vue3";
import { usePermission } from "@/composables/permission";

const props = defineProps({
  payments: Object,
  payment: Object,
  products: Object,
  product: Object,
});


// const notification = usePage().props.notifications;
</script>

<template>
  <Head title="Report" />

  <AdminLayout>
    <div class="px-8 w-full">
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
              <Link :href="route('reports.index')" :active="false">
                <span class="font-sans">{{ $t("Reports") }}</span>
              </Link>
            </span>
          </div>
        </div>
      </div>
      <div class="mx-4 md:flex mx:flex block justify-between space-x-10">
        <Link
        :href="route('SaleReport.SaleReport')"
        class="md:w-1/2 mx:w-1/2 w-full rounded-lg dark:bg-white dark:hover:shadow-green-800 shadow-md shadow-gray-400 transition-all hover:shadow-lg hover:shadow-blue-500/40"
      >
        <h1 class="p-5 text-xl font-khmer">{{ $t("Sale Report") }}</h1>
        <div class="flex bg-gray-200">
          <div class="block space-y-4">
            <div class="flex w-64 h-24 px-5 py-5">
              <div
                class="bg-green-800 text-white rounded-full h-14 w-14 p-4 mr-2"
              >
                <svg
                  class="w-6 h-6 dark:text-white"
                  aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  fill="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    fill-rule="evenodd"
                    d="M4 5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H4Zm0 6h16v6H4v-6Z"
                    clip-rule="evenodd"
                  />
                  <path
                    fill-rule="evenodd"
                    d="M5 14a1 1 0 0 1 1-1h2a1 1 0 1 1 0 2H6a1 1 0 0 1-1-1Zm5 0a1 1 0 0 1 1-1h5a1 1 0 1 1 0 2h-5a1 1 0 0 1-1-1Z"
                    clip-rule="evenodd"
                  />
                </svg>
              </div>
              <div class="">
                <span class="text-green-800 text-3xl">{{ payment }}</span>
                <div class="text-green-950 text-md">
                  {{ $t("Invoice") }}
                </div>
              </div>
            </div>
            <div class="flex w-64 h-20 ml-5">
              <div
                class="bg-green-800 text-white rounded-full h-14 w-14 p-4 mr-2"
              >
                <svg
                  class="w-6 h-6 dark:text-white"
                  aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  fill="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    fill-rule="evenodd"
                    d="M11 16.5a5.5 5.5 0 1 1 11 0 5.5 5.5 0 0 1-11 0Zm4.5 2.5v-1.5H14v-2h1.5V14h2v1.5H19v2h-1.5V19h-2Z"
                    clip-rule="evenodd"
                  />
                  <path
                    d="M3.987 4A2 2 0 0 0 2 6v9a2 2 0 0 0 2 2h5v-2H4v-5h16V6a2 2 0 0 0-2-2H3.987Z"
                  />
                  <path
                    fill-rule="evenodd"
                    d="M5 12a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2H6a1 1 0 0 1-1-1Z"
                    clip-rule="evenodd"
                  />
                </svg>
              </div>
              <div class="">
                <span class="text-green-800 text-3xl">$ {{ payments }}</span>
                <div class="text-green-950 text-md">
                  {{ $t("Revenue") }}
                </div>
              </div>
            </div>
          </div>
          <div class="">
            <img
              src="https://www.bigtime.net/wp-content/uploads/2024/05/How-to-Improve-Profitability-at-a-Professional-Services-Company.png"
              class="h-40 -ml-5 mt-5"
              alt=""
            />
          </div>
        </div>
      </Link>
      <Link
        :href="route('BuyReport.BuyReport')"
        class="md:w-1/2 mx:w-1/2 w-full rounded-lg dark:bg-white dark:hover:shadow-green-800 shadow-md shadow-gray-400 transition-all hover:shadow-lg hover:shadow-blue-500/40"
      >
        <h1 class="p-5 text-xl font-khmer">{{ $t("Buy Reports") }}</h1>
        <div class="flex bg-gray-200">
          <div class="block space-y-4">
            <div class="flex w-64 h-24 px-5 py-5">
              <div
                class="bg-green-800 text-white rounded-full h-14 w-14 p-4 mr-2"
              >
                <svg
                  class="w-6 h-6 dark:text-white"
                  aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  fill="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    fill-rule="evenodd"
                    d="M4 5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H4Zm0 6h16v6H4v-6Z"
                    clip-rule="evenodd"
                  />
                  <path
                    fill-rule="evenodd"
                    d="M5 14a1 1 0 0 1 1-1h2a1 1 0 1 1 0 2H6a1 1 0 0 1-1-1Zm5 0a1 1 0 0 1 1-1h5a1 1 0 1 1 0 2h-5a1 1 0 0 1-1-1Z"
                    clip-rule="evenodd"
                  />
                </svg>
              </div>
              <div class="">
                <span class="text-green-800 text-3xl"> {{ product }}</span>
                <div class="text-green-950 text-md">
                  {{ $t("Product") }}
                </div>
              </div>
            </div>
            <div class="flex w-64 h-20 ml-5">
              <div
                class="bg-green-800 text-white rounded-full h-14 w-14 p-4 mr-2"
              >
                <svg
                  class="w-6 h-6 dark:text-white"
                  aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  fill="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    fill-rule="evenodd"
                    d="M11 16.5a5.5 5.5 0 1 1 11 0 5.5 5.5 0 0 1-11 0Zm4.5 2.5v-1.5H14v-2h1.5V14h2v1.5H19v2h-1.5V19h-2Z"
                    clip-rule="evenodd"
                  />
                  <path
                    d="M3.987 4A2 2 0 0 0 2 6v9a2 2 0 0 0 2 2h5v-2H4v-5h16V6a2 2 0 0 0-2-2H3.987Z"
                  />
                  <path
                    fill-rule="evenodd"
                    d="M5 12a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2H6a1 1 0 0 1-1-1Z"
                    clip-rule="evenodd"
                  />
                </svg>
              </div>
              <div class="">
                <span class="text-green-800 text-3xl">$ {{ products }}</span>
                <div class="text-green-950 text-md">
                  {{ $t("Expenses") }}
                </div>
              </div>
            </div>
          </div>
          <div class="">
            <img
              src="https://www.bigtime.net/wp-content/uploads/2024/05/How-to-Improve-Profitability-at-a-Professional-Services-Company.png"
              class="h-40 -ml-5 mt-5"
              alt=""
            />
          </div>
        </div>
      </Link>
    </div>
    </div>
  </AdminLayout>
</template>
