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
// import PaginationLink from "@/Components/PaginationLink.vue";
import moment from "moment";
// const notification = usePage().props.notifications;
const props = defineProps({
    payments: Object,
  filters: Object,
  totalAmount:Object,
});

// Setup reactive form fields for dates
const start_date = ref(props.filters.start_date || '');
const end_date = ref(props.filters.end_date || '');

// Function to filter records
const filterRecords = () => {
  router.get(route('SaleReport.SaleReport'), {
    start_date: start_date.value,
    end_date: end_date.value,
  });
};

const formatDate = (date) => moment(date).format('DD/MMM/YYYY');
const formatNumber = (number) => number.toString().padStart(4, '0');

const { hasPermission } = usePermission();

// Function to export payments
const exportPayments = () => {
  window.location.href = `/reports/download?start_date=${start_date.value}&end_date=${end_date.value}`;
};

// Function to toggle image scaling
const toggleImageScale = (payment) => {
  payment.isScaled = !payment.isScaled;
};
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
              <Link >
                <span class="font-sans">{{ $t("Sale Report") }}</span>
              </Link>
            </span>
          </div>
        </div>

      </div>
      <div class="flex justify-between">
        <div class="flex space-x-2">
          <div class="flex ">
            <button
              @click="exportPayments"
              class="middle none center flex items-center justify-center rounded-lg w-24 h-10 hover:scale-110 hover:skew-y-3 border-2 border-green-600 font-sans text-sm text-green-600 shadow-md transition-all hover:shadow-lg hover:shadow-green-700"
              data-ripple-light="true"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="currentColor"
                class="size-4 mr-1"
              >
                <path
                  fill-rule="evenodd"
                  d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0 0 16.5 9h-1.875a1.875 1.875 0 0 1-1.875-1.875V5.25A3.75 3.75 0 0 0 9 1.5H5.625ZM7.5 15a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 7.5 15Zm.75 2.25a.75.75 0 0 0 0 1.5H12a.75.75 0 0 0 0-1.5H8.25Z"
                  clip-rule="evenodd"
                />
                <path
                  d="M12.971 1.816A5.23 5.23 0 0 1 14.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 0 1 3.434 1.279 9.768 9.768 0 0 0-6.963-6.963Z"
                />
              </svg>

              {{ $t("Excel") }}
            </button>
          </div>

        </div>
 <!-- Filter Form -->
 <form @submit.prevent="filterRecords">
          <div class="flex justify-end space-x-3 mb-2">
            <div class="relative max-w-sm">
              <div
                class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none"
              >
                <svg
                  class="w-4 h-4 text-gray-500 dark:text-gray-400"
                  aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <path
                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"
                  />
                </svg>
              </div>
              <input
                type="date"
                v-model="start_date"
                placeholder="Start Date"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              />
            </div>
            <div class="relative max-w-sm">
              <div
                class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none"
              >
                <svg
                  class="w-4 h-4 text-gray-500 dark:text-gray-400"
                  aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <path
                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"
                  />
                </svg>
              </div>
              <input
                type="date"
                v-model="end_date"
                placeholder="End Date"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              />
            </div>
            <div>
              <button type="submit" class="mt-2">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24"
                  fill="currentColor"
                  class="size-6 text-yellow-600"
                >
                  <path
                    fill-rule="evenodd"
                    d="M3.792 2.938A49.069 49.069 0 0 1 12 2.25c2.797 0 5.54.236 8.209.688a1.857 1.857 0 0 1 1.541 1.836v1.044a3 3 0 0 1-.879 2.121l-6.182 6.182a1.5 1.5 0 0 0-.439 1.061v2.927a3 3 0 0 1-1.658 2.684l-1.757.878A.75.75 0 0 1 9.75 21v-5.818a1.5 1.5 0 0 0-.44-1.06L3.13 7.938a3 3 0 0 1-.879-2.121V4.774c0-.897.64-1.683 1.542-1.836Z"
                    clip-rule="evenodd"
                  />
                </svg>
              </button>
            </div>
          </div>
        </form>

      </div>

      <div>
        <!-- <p>{{ $en.test }}</p> -->
      </div>
      <div class="shadow overflow-y rounded">
        <Table class="w-full">
          <template #header>
            <TableRow>
              <TableHeaderCell>{{ $t("Parcel ID") }}</TableHeaderCell>
              <TableHeaderCell>{{ $t("Image") }}</TableHeaderCell>
              <TableHeaderCell>{{ $t("Name") }}</TableHeaderCell>
              <TableHeaderCell>{{ $t("Date") }}</TableHeaderCell>
              <TableHeaderCell>{{ $t("Type") }}</TableHeaderCell>
              <TableHeaderCell>{{ $t("TotalAmoun") }}</TableHeaderCell>
            </TableRow>
          </template>
          <template #default>
            <TableRow v-for="payment in payments" :key="payment.id" class="border-b">
              <TableDataCell># {{ formatNumber(payment.id) }}</TableDataCell>
              <TableDataCell>
                <img v-if="payment.imagepay" :src="payment.imagepay"  class="w-14 h-14 rounded bg-gray-200 text-sm text-center"
                :class="{ 'w-14 h-14 rounded bg-gray-200 text-sm text-center  scaled-image': payment.isScaled }"
                @click="toggleImageScale(payment)"
                 alt="No Image">
            </TableDataCell>
              <TableDataCell>{{ payment.order.created_by.name }}</TableDataCell>
              <TableDataCell>{{ formatDate(payment.created_date) }}</TableDataCell>
              <TableDataCell>{{ payment.type }}</TableDataCell>
              <TableDataCell>${{ payment.amount }}</TableDataCell>
            </TableRow>
            <TableRow class="border-b bg-gray-200">
              <TableDataCell></TableDataCell>
              <TableDataCell></TableDataCell>
              <TableDataCell></TableDataCell>
              <TableDataCell></TableDataCell>
              <TableDataCell class="font-bold">{{$t('Total')}}</TableDataCell>
              <TableDataCell>${{ totalAmount}}</TableDataCell>
            </TableRow>
          </template>
        </Table>


      </div>
    </div>

  </AdminLayout>
</template>
