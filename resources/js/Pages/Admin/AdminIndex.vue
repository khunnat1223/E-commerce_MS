<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Head } from "@inertiajs/vue3";

defineProps([
  "users",
  "roles",
  "permissions",
  "staffs",
  "products",
  "categorys",
  "orders",
  "payments",
  "suppliers",
  "productCost",
  "notifications",
  "paymant",
]);
</script>

<template>
  <Head title="Dashboard" />

  <AdminLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Admin Dashboard
      </h2>
    </template>

    <div class="m-4 flex flex-wrap justify-between">
      <div
        class="mb-4 w-60 h-24 rounded-lg dark:bg-white dark:hover:shadow-yellow-800 shadow-md shadow-gray-400 transition-all hover:shadow-lg hover:shadow-yellow-900/40"
      >
        <div class="flex px-2 py-5">
          <div class="bg-yellow-800 text-white rounded-full h-14 w-14 p-4 mr-2">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="size-6"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z"
              />
            </svg>
          </div>
          <div class="">
            <span class="text-yellow-600 text-3xl"> {{ staffs }} </span>
            <div class="text-green-950 text-md">{{ $t("Staff") }}</div>
          </div>
        </div>
      </div>
      <div
        class="mb-4 w-60 h-24 rounded-lg dark:bg-white dark:hover:shadow-blue-500 shadow-md shadow-gray-400 transition-all hover:shadow-lg hover:shadow-blue-500/40"
      >
        <div class="flex px-2 py-5">
          <div class="bg-blue-600 text-white rounded-full h-14 w-14 p-4 mr-2">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="w-6 h-6"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M4.5 12a7.5 7.5 0 0 0 15 0m-15 0a7.5 7.5 0 1 1 15 0m-15 0H3m16.5 0H21m-1.5 0H12m-8.457 3.077 1.41-.513m14.095-5.13 1.41-.513M5.106 17.785l1.15-.964m11.49-9.642 1.149-.964M7.501 19.795l.75-1.3m7.5-12.99.75-1.3m-6.063 16.658.26-1.477m2.605-14.772.26-1.477m0 17.726-.26-1.477M10.698 4.614l-.26-1.477M16.5 19.794l-.75-1.299M7.5 4.205 12 12m6.894 5.785-1.149-.964M6.256 7.178l-1.15-.964m15.352 8.864-1.41-.513M4.954 9.435l-1.41-.514M12.002 12l-3.75 6.495"
              />
            </svg>
          </div>
          <div class="">
            <span class="text-blue-600 text-3xl">{{ roles }}</span>
            <div class="text-green-950 text-md">{{ $t("role") }}</div>
          </div>
        </div>
      </div>
      <div
        class="mb-4 w-60 h-24 rounded-lg dark:bg-white dark:hover:shadow-yellow-500 shadow-md shadow-gray-400 transition-all hover:shadow-lg hover:shadow-blue-500/40"
      >
        <div class="flex px-2 py-5">
          <div class="bg-yellow-400 text-white rounded-full h-14 w-14 p-4 mr-2">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="size-6"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m3.75 9v7.5m2.25-6.466a9.016 9.016 0 0 0-3.461-.203c-.536.072-.974.478-1.021 1.017a4.559 4.559 0 0 0-.018.402c0 .464.336.844.775.994l2.95 1.012c.44.15.775.53.775.994 0 .136-.006.27-.018.402-.047.539-.485.945-1.021 1.017a9.077 9.077 0 0 1-3.461-.203M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"
              />
            </svg>
          </div>
          <div class="">
            <span class="text-yellow-400 text-3xl">{{ paymant }} </span>
            <div class="text-green-950 text-md">{{ $t("Reports") }}</div>
          </div>
        </div>
      </div>
      <div
        class="mb-4 w-60 h-24 rounded-lg dark:bg-white dark:hover:shadow-green-800 shadow-md shadow-gray-400 transition-all hover:shadow-lg hover:shadow-blue-500/40"
      >
        <div class="flex px-2 py-5">
          <div class="bg-green-600 text-white rounded-full h-14 w-14 p-4 mr-2">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="w-6 h-6"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"
              />
            </svg>
          </div>
          <div class="">
            <span class="text-green-600 text-3xl">{{ users }}</span>
            <div class="text-green-950 text-md">{{ $t("user") }}</div>
          </div>
        </div>
      </div>
    </div>
    <div class="mx-4 md:flex mx:flex block justify-between space-x-10">
      <div
        class="md:w-1/2 mx:w-1/2 w-full rounded-lg dark:bg-white dark:hover:shadow-green-800 shadow-md shadow-gray-400 transition-all hover:shadow-lg hover:shadow-blue-500/40"
      >
        <h1 class="p-5 text-xl font-khmer">{{ $t("Product Information") }}</h1>
        <div class="flex bg-gray-200 space-x-8">
          <div class="flex w-60 h-24 px-5 py-5">
            <div
              class="bg-green-800 text-white rounded-full h-14 w-14 p-4 mr-2"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="currentColor"
                class="size-6"
              >
                <path
                  d="M4.5 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM14.25 8.625a3.375 3.375 0 1 1 6.75 0 3.375 3.375 0 0 1-6.75 0ZM1.5 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM17.25 19.128l-.001.144a2.25 2.25 0 0 1-.233.96 10.088 10.088 0 0 0 5.06-1.01.75.75 0 0 0 .42-.643 4.875 4.875 0 0 0-6.957-4.611 8.586 8.586 0 0 1 1.71 5.157v.003Z"
                />
              </svg>
            </div>
            <div class="">
              <span class="text-green-800 text-3xl">{{ suppliers }}</span>
              <div class="text-green-950 text-md">{{ $t("Supplier") }}</div>
            </div>
          </div>
          <div class="flex w-60 h-24 px-5 py-5">
            <div
              class="bg-green-800 text-white rounded-full h-14 w-14 p-4 mr-2"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="currentColor"
                class="size-6"
              >
                <path
                  fill-rule="evenodd"
                  d="M1.5 9.832v1.793c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875V9.832a3 3 0 0 0-.722-1.952l-3.285-3.832A3 3 0 0 0 16.215 3h-8.43a3 3 0 0 0-2.278 1.048L2.222 7.88A3 3 0 0 0 1.5 9.832ZM7.785 4.5a1.5 1.5 0 0 0-1.139.524L3.881 8.25h3.165a3 3 0 0 1 2.496 1.336l.164.246a1.5 1.5 0 0 0 1.248.668h2.092a1.5 1.5 0 0 0 1.248-.668l.164-.246a3 3 0 0 1 2.496-1.336h3.165l-2.765-3.226a1.5 1.5 0 0 0-1.139-.524h-8.43Z"
                  clip-rule="evenodd"
                />
                <path
                  d="M2.813 15c-.725 0-1.313.588-1.313 1.313V18a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3v-1.688c0-.724-.588-1.312-1.313-1.312h-4.233a3 3 0 0 0-2.496 1.336l-.164.246a1.5 1.5 0 0 1-1.248.668h-2.092a1.5 1.5 0 0 1-1.248-.668l-.164-.246A3 3 0 0 0 7.046 15H2.812Z"
                />
              </svg>
            </div>
            <div class="">
              <span class="text-green-800 text-3xl">{{ categorys }}</span>
              <div class="text-green-950 text-md">{{ $t("Category") }}</div>
            </div>
          </div>
        </div>
        <div class="flex bg-gray-200 grid-cols-2 space-x-8">
          <div class="flex w-60 h-24 px-5 py-5">
            <div
              class="bg-green-800 text-white rounded-full h-14 w-14 p-4 mr-2"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="currentColor"
                class="size-6"
              >
                <path
                  d="M12.378 1.602a.75.75 0 0 0-.756 0L3 6.632l9 5.25 9-5.25-8.622-5.03ZM21.75 7.93l-9 5.25v9l8.628-5.032a.75.75 0 0 0 .372-.648V7.93ZM11.25 22.18v-9l-9-5.25v8.57a.75.75 0 0 0 .372.648l8.628 5.033Z"
                />
              </svg>
            </div>
            <div class="">
              <span class="text-green-800 text-3xl">{{ products }}</span>
              <div class="text-green-950 text-md">{{ $t("Products") }}</div>
            </div>
          </div>
          <div class="flex w-60 h-24 px-5 py-5">
            <div
              class="bg-green-800 text-white rounded-full h-14 w-14 p-4 mr-2"
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
                <path d="M19.5 19.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
              </svg>
            </div>
            <div class="">
              <span class="text-green-800 text-3xl">{{ orders }}</span>
              <div class="text-green-950 text-md">{{ $t("Order") }}</div>
            </div>
          </div>
        </div>
      </div>
      <div
        class="md:w-1/2 mx:w-1/2 w-full rounded-lg dark:bg-white dark:hover:shadow-green-800 shadow-md shadow-gray-400 transition-all hover:shadow-lg hover:shadow-blue-500/40"
      >
        <h1 class="p-5 text-xl font-khmer">{{ $t("Revenue and Expenses") }}</h1>
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
                <span class="text-green-800 text-3xl">$ {{ productCost }}</span>
                <div class="text-green-950 text-md">
                  {{ $t("ប្រាក់ចំណាយ") }}
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
                  {{ $t("ប្រាក់ចំណូល") }}
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
      </div>
    </div>
  </AdminLayout>
</template>
