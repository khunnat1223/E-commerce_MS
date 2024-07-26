<script setup>
import { ref } from "vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Head, Link, useForm, router } from "@inertiajs/vue3";
import { usePermission } from "@/composables/permission";

import Table from "@/Components/Table.vue";
import TableRow from "@/Components/TableRow.vue";
import TableHeaderCell from "@/Components/TableHeaderCell.vue";
import TableDataCell from "@/Components/TableDataCell.vue";
import PaginationLink from "@/Components/PaginationLink.vue";


import moment from "moment";

// Define props
const props = defineProps({
  orders: Array,
  filters: Object,
});

// Setup reactive form fields for dates
const start_date = ref(props.filters.start_date || "");
const end_date = ref(props.filters.end_date || "");

// Function to format dates
const formatDate = (date) => {
  return moment(date).format("DD/MMM/YYYY");
};

// Function to format numbers with leading zeros
const formatNumber = (number) => {
  return number.toString().padStart(4, "0");
};

// Use Inertia.js form for submitting data
const form = useForm({});
const OrderId = ref("");
const { hasPermission } = usePermission();

// Function to update order status
const updateOrder = (id) => {
  OrderId.value = id;
  form.put(route("orders.update", OrderId.value), {
    onFinish: () => {},
  });
};

// Function to cancel order
const updateOrderCancel = async (id) => {
  OrderId.value = id;
  router.put("/admin/orders/update-to-cancel/" + OrderId.value, {});
};

// Function to filter records
const filterRecords = () => {
  router.get(route("orders.index"), {
    start_date: start_date.value,
    end_date: end_date.value,
  });
};
</script>

<template>
  <Head title="Orders" />

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
              <Link :href="route('orders.index')" :active="false">
                <span class="font-sans">{{ $t("Orders") }}</span>
              </Link>
            </span>
          </div>
        </div>

        <!-- Filter Form -->
        <form @submit.prevent="filterRecords">
          <div class="flex justify-end space-x-3">
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
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
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
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
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

      <div class="shadow overflow-auto rounded">
        <Table class="w-full">
          <template #header>
            <TableRow>
              <TableHeaderCell>{{ $t("Parcel ID") }}</TableHeaderCell>
              <TableHeaderCell>{{ $t("Date") }}</TableHeaderCell>
              <TableHeaderCell>{{ $t("Customers") }}</TableHeaderCell>
              <TableHeaderCell>{{ $t("Payment") }}</TableHeaderCell>
              <TableHeaderCell>{{ $t("Status") }}</TableHeaderCell>
              <TableHeaderCell>{{ $t("Total") }}</TableHeaderCell>
              <TableHeaderCell class="text-center">{{
                $t("Action")
              }}</TableHeaderCell>
            </TableRow>
          </template>
          <template #default>
            <TableRow
              v-for="order in orders.data"
              :key="order.id"
              class="border-b"
            >
              <TableDataCell># {{ formatNumber(order.id) }}</TableDataCell>
              <TableDataCell>{{ formatDate(order.created_at) }}</TableDataCell>
              <TableDataCell>{{ order.created_by.name }}</TableDataCell>
              <TableDataCell>
                <span
                  v-if="order.status.payment == 0"
                  class="bg-red-100 text-red-800 text-sm font-medium px-2.5 py-0.5 rounded-full -mt-2 -mb-2"
                  >{{ $t("Unpaid") }}!</span
                >
                <span
                  v-else
                  class="bg-green-100 text-green-800 text-sm font-medium px-2.5 py-0.5 -mt-2 -mb-2 rounded-full"
                  >{{ $t("Paid") }}</span
                >
              </TableDataCell>
              <TableDataCell>
                <span
                  v-if="order.status == 0"
                  class="bg-yellow-100 text-red-800 text-sm font-medium px-2.5 py-0.5 rounded-full -mt-2 -mb-2"
                  >{{ $t("Please Wait...!") }}</span
                >
                <span
                  v-else
                  class="bg-blue-100 text-blue-800 text-sm font-medium px-2.5 py-0.5 -mt-2 -mb-2 rounded-full"
                  >{{ $t("Sent") }}</span
                >
              </TableDataCell>
              <TableDataCell>${{ order.total_price }}</TableDataCell>
              <TableDataCell class="">
                <span class="text-yellow-500 flex justify-end">
                  <Link
                    v-if="hasPermission('Update Product')"
                    :href="route('orders.show', order.id)"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      fill="currentColor"
                      class="size-5"
                    >
                      <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                      <path
                        fill-rule="evenodd"
                        d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                        clip-rule="evenodd"
                      />
                    </svg>
                  </Link>
                  <span class="mx-1">||</span>

                  <button
                    v-if="hasPermission('Delete Product')"
                    @click="updateOrder(order.id)"
                    class="text-green-700 ml-1"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      fill="currentColor"
                      class="size-6"
                    >
                      <path
                        d="M3.375 4.5C2.339 4.5 1.5 5.34 1.5 6.375V13.5h12V6.375c0-1.036-.84-1.875-1.875-1.875h-8.25ZM13.5 15h-12v2.625c0 1.035.84 1.875 1.875 1.875h.375a3 3 0 1 1 6 0h3a.75.75 0 0 0 .75-.75V15Z"
                      />
                      <path
                        d="M8.25 19.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0ZM15.75 6.75a.75.75 0 0 0-.75.75v11.25c0 .087.015.17.042.248a3 3 0 0 1 5.958.464c.853-.175 1.522-.935 1.464-1.883a18.659 18.659 0 0 0-3.732-10.104 1.837 1.837 0 0 0-1.47-.725H15.75Z"
                      />
                      <path
                        d="M19.5 19.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"
                      />
                    </svg>
                  </button>
                  <span class="mx-1">||</span>
                  <button
                    v-if="hasPermission('Delete Product')"
                    @click="updateOrderCancel(order.id)"
                    class="text-green-700 ml-1"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      fill="currentColor"
                      class="size-6 text-red-600"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M2.515 10.674a1.875 1.875 0 0 0 0 2.652L8.89 19.7c.352.351.829.549 1.326.549H19.5a3 3 0 0 0 3-3V6.75a3 3 0 0 0-3-3h-9.284c-.497 0-.974.198-1.326.55l-6.375 6.374ZM12.53 9.22a.75.75 0 1 0-1.06 1.06L13.19 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06l1.72-1.72 1.72 1.72a.75.75 0 1 0 1.06-1.06L15.31 12l1.72-1.72a.75.75 0 1 0-1.06-1.06l-1.72 1.72-1.72-1.72Z"
                        clip-rule="evenodd"
                      />
                    </svg>
                  </button>
                </span>
              </TableDataCell>
            </TableRow>
          </template>
        </Table>
        <div class="pr-4">
          <!-- pagination -->
          <PaginationLink :paginator="orders" />
        </div>
      </div>
    </div>
  </AdminLayout>
</template>
