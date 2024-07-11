<script setup>
import { ref } from "vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Head } from "@inertiajs/vue3";
import { Link, useForm } from "@inertiajs/vue3";
import { usePermission } from "@/composables/permission";

import Table from "@/Components/Table.vue";
import TableRow from "@/Components/TableRow.vue";
import TableFooter from "@/Components/TableFooter.vue";
import TableHeaderCell from "@/Components/TableHeaderCell.vue";
import TableDataCell from "@/Components/TableDataCell.vue";

import Modal from "@/Components/Modal.vue";
import DangerButton from "@/Components/DangerButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";

defineProps({
    products: Array,

});

const id =1;
const form = useForm({});
const ProductID = ref("");

const showComfirmDeleteProductModel = ref(false);

const { hasPermission } = usePermission();

const ComfimDeleteProduct = (id) => {
  showComfirmDeleteProductModel.value = true;
  ProductID.value = id;
};

const closeModal = () => {
  showComfirmDeleteProductModel.value = false;
};

const deleteProduct = () => {
  form.delete(route("products.destroy", ProductID.value), {
    onSuccess: () => closeModal(),
  });
};
</script>

<template>
  <Head title="Products" />

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
      <div>
        <!-- <p>{{ $en.test }}</p> -->
      </div>
      <div class="shadow overflow-x-auto rounded-lg border-b dark:border-gray-800 dark:shadow-md dark:shadow-gray-600">
        <Table class="bg-white dark:bg-slate-100">
          <template #header>
            <TableRow>
              <TableHeaderCell>{{ $t("ID") }}</TableHeaderCell>
              <TableHeaderCell>{{ $t("Image") }}</TableHeaderCell>
              <TableHeaderCell>{{ $t("Products") }}</TableHeaderCell>
              <TableHeaderCell>{{ $t("Cost") }}</TableHeaderCell>
              <TableHeaderCell>{{ $t("Price") }}</TableHeaderCell>
              <TableHeaderCell>{{ $t("Quantity") }}</TableHeaderCell>
              <TableHeaderCell>{{ $t("Status") }}</TableHeaderCell>
              <TableHeaderCell>{{ $t("Published") }}</TableHeaderCell>
              <TableHeaderCell>{{ $t("Action") }}</TableHeaderCell>

            </TableRow>
          </template>
          <template #default>
            <TableRow
              v-for="Product in products"
              :key="Product.id"
              class="border-b"
            >
              <TableDataCell>P-{{ id++ }}</TableDataCell>
              <TableDataCell>
                    <img
                    v-if="Product.product_images.length > 0"
                      class="w-10 h-10 rounded"
                      :src="`/${Product.product_images[0].image}`"
                      alt=""
                    />
                    <img
                    v-else
                      class="w-10 h-10 rounded"
                      src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/1665px-No-Image-Placeholder.svg.png"
                      alt=""
                    />
            </TableDataCell>
              <!-- <TableDataCell>{{ Product.title }}</TableDataCell> -->
              <TableDataCell>{{ Product.title }}</TableDataCell>
              <TableDataCell>{{ Product.cost }}</TableDataCell>
              <TableDataCell>{{ Product.price }}</TableDataCell>
              <TableDataCell>{{ Product.qty }}</TableDataCell>
              <TableDataCell>
                <span v-if="Product.inStock == 0" class="bg-green-100 text-green-800 text-sm font-medium  px-2.5 py-2 -mt-2 -mb-2 rounded-full ">{{ $t("StockIn") }}</span>
                <span v-else class="bg-red-100 text-red-800 text-sm font-medium  px-2.5 py-0.5 rounded-full -mt-2 -mb-2">{{ $t("StockOut") }}</span>
                </TableDataCell>

                <TableDataCell>
                <button type="button" v-if="Product.published == 1" class="text-green-600 hover:text-white border border-green-600 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-full text-sm px-2 py-1 -mt-2 -mb-2  text-center dark:border-green-300 dark:hover:text-white  dark:hover:bg-green-500 dark:text-white dark:bg-green-400 dark:focus:ring-green-900"> {{ $t("Published") }}</button>
                <button type="button" v-else class="text-yellow-800 hover:text-white border border-yellow-800 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-full text-sm px-2 py-1 -mt-2 -mb-2  text-center dark:border-yellow-300 dark:hover:text-white  dark:hover:bg-yellow-500 dark:text-white dark:bg-yellow-400 dark:focus:ring-yellow-900"> {{ $t("Unpublish") }}</button>
            </TableDataCell>

              <TableDataCell>
                <span class="text-yellow-500 flex">
                  <Link
                    v-if="hasPermission('Update Product')"
                    :href="route('products.edit', Product.id)"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-5 w-5 text-yellow-600 mx-2 hover:text-hovercolorBG"
                      viewBox="0 0 20 20"
                      fill="currentColor"
                    >
                      <path
                        d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"
                      />
                      <path
                        fill-rule="evenodd"
                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                        clip-rule="evenodd"
                      />
                    </svg>
                  </Link>

                  <button
                    v-if="hasPermission('Delete Product')"
                    @click="ComfimDeleteProduct(Product.id)"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-5 w-5 text-red-600 hover:text-red-900"
                      viewBox="0 0 20 20"
                      fill="currentColor"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                        clip-rule="evenodd"
                      />
                    </svg>
                  </button>

                  <!-- <button @click="ComfimDeleteUser" class="text-red-800 border-2 px-5 rounded-md  font-sans" >{{ $t('delete') }}</button> -->

                  <Modal
                    :show="showComfirmDeleteProductModel"
                    @click="closeModal"
                  >
                    <div class="relative p-4 text-center rounded-lg">
                      <svg
                        class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto"
                        aria-hidden="true"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                          clip-rule="evenodd"
                        ></path>
                      </svg>
                      <p class="mb-4 text-gray-500 dark:text-gray-300">
                        {{ $t("comfimdelete") }}
                      </p>

                      <DangerButton @click="deleteProduct">{{
                        $t("delete")
                      }}</DangerButton>
                      <SecondaryButton @click="closeModal">{{
                        $t("cancel")
                      }}</SecondaryButton>
                    </div>
                  </Modal>
                  <!-- |
                  <button
                    @click="deleteProduct(Category.id)"
                  >

                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-5 w-5 text-red-600 hover:text-red-900"
                      viewBox="0 0 20 20"
                      fill="currentColor"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                        clip-rule="evenodd"
                      />
                    </svg>

                  </button> -->
                </span>
              </TableDataCell>
            </TableRow>
          </template>
        </Table>
        <div
          class="flex px-3 py-2 bg-slate-200 justify-between w-full overflow-x-auto"
        >
          <div class="pt-1">Total: 30</div>
          <div>
            <nav aria-label="Page navigation example">
              <ul class="inline-flex -space-x-px text-sm">
                <li>
                  <a
                    href="#"
                    class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                    >Pre</a
                  >
                </li>
                <li>
                  <a
                    href="#"
                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                    >1</a
                  >
                </li>
                <li>
                  <a
                    href="#"
                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                    >2</a
                  >
                </li>
                <li>
                  <a
                    href="#"
                    aria-current="page"
                    class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white"
                    >3</a
                  >
                </li>
                <li>
                  <a
                    href="#"
                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                    >4</a
                  >
                </li>
                <li>
                  <a
                    href="#"
                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                    >5</a
                  >
                </li>
                <li>
                  <a
                    href="#"
                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                    >>></a
                  >
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </AdminLayout>
</template>
