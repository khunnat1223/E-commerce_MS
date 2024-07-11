<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import moment from 'moment';
defineProps({
  orders: Array,
});

const i = 1;


const formatDate = (date) => {
  return moment(date).format('DD/MMM/YYYY');
};

</script>
<template>
  <HomeLayout>


<div class=" px-24 relative overflow-x-auto h-screen shadow-md sm:rounded-lg">

       <!-- Path for Back -->
       <div class="text-md font-sans cursor-pointer flex mb-10">
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
              <a :href="route('home.index')" :active="false">
                <span class="font-sans">{{ $t("Home") }}</span>
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
              class="w-5 h-4 mt-2"
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
              <a>
                <span class="font-sans">{{ $t("History") }}</span>
              </a>
            </span>
          </div>
        </div>
    <table
        v-show="order.order_items.length > 0"
        v-for="order in orders"
        :key="order.id"
        class="w-full text-sm text-left mb-8 rtl:text-right text-gray-800 dark:text-gray-400">
        <div >ORDER ID # {{ i++ }}</div>
            <tr class="bg-gray-200 rounded-lg">
                <th scope="col" class="px-6 py-3">
                    Images
                </th>
                <th scope="col" class="px-6 py-3">
                    Products
                </th>
                <th scope="col" class="px-6 py-3">
                    Quantity
                </th>
                <th scope="col" class="px-6 py-3 text-right">
                    Price
                </th>
            </tr>

        <tbody>
            <tr
             v-for="item in order.order_items"
            :key="item.id"
            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <img
                v-if="item.product.product_images.length > 0"
                class="w-10 h-10 rounded"
                :src="`/${item.product.product_images[0].image}`"
                alt=""
              />
              <img
                v-else
                class="w-10 h-10 rounded"
                src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/1665px-No-Image-Placeholder.svg.png"
                alt=""
              />
                </th>
                <td class="px-6 py-4">
                    {{ item.product.title }}
                </td>
                <td class="px-6 py-4">
                    {{ item.quantity }}
                </td>
                <td class="px-6 py-4 text-right">
                ${{ item.product.price }}
                </td>
            </tr>
            <tr
            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class=" font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <div class="mb-2">
                        Date: {{ formatDate(order.updated_at) }}
                </div>
                <div class="mb-2">
                    Order:
                    <span v-if="order.status  == 0" class="bg-red-100 text-red-800 text-sm font-medium  px-2.5 py-0.5 rounded-full -mt-2 -mb-2" >{{ $t("Please Wait...!") }}</span>
                    <span v-else class="bg-green-100 text-green-800 text-sm font-medium  px-2.5 py-0.5 -mt-2 -mb-2 rounded-full ">{{ $t("Sented") }}</span>
                </div>
                </th>
                <td class="px-6 py-4">

                </td>
                <td class="px-6 py-4">

                </td>
                <td class="px-6 py-4 text-right">
                    <div>
                    Total Price:$ {{ order.total_price }}
                </div>
                </td>
            </tr>



        </tbody>
    </table>
</div>

  </HomeLayout>
</template>
