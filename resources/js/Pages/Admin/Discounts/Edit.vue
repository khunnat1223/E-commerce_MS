<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import { ref } from 'vue';

const props = defineProps({
  discount: Object,
  image: String,
});

const form = useForm({
  title: props.discount.title,
  discount: props.discount.percentage,
  description: props.discount.description,
  image: props.image,
    _method: 'PUT'
});

const preview = ref('');

const handleFileChange = (event) => {
      const file = event.target.files[0];
      if (file) {
        form.image = file;
        const reader = new FileReader();
        reader.onload = (e) => {
          preview.value = e.target.result;
        };
        reader.readAsDataURL(file);
      }
    };

const updateDiscount = () => {
      form.post(`/discounts/${props.discount.id}`, {
        onFinish: () => {
          form.reset();
          preview.value = props.discount.image ? `/storage/${props.discount.image}` : null;
        },
        preserveScroll: true,
        preserveState: true,
      });
    };
</script>

<template>
  <Head title="Update Discount" />

  <AdminLayout>
    <div class="px-8 w-full">
      <div class="">
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
              <Link :href="route('discounts.index')" :active="false">
                <span class="font-sans">{{ $t("Discount") }}</span>
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
              <span class="font-sans">{{ $t("Create") }}</span>
            </span>
          </div>
        </div>
      </div>

      <div class="mt-6 bg-slate-200 p-6 rounded-lg">
        <h1 class="pl-4 pb-6 text-xl">
          {{ $t("Create") }} / {{ $t("Discount") }}
        </h1>
        <form @submit.prevent="updateDiscount">
          <div class="block w-full md:flex ms:block">
            <div class="md:w-1/2 mr-2">
              <div>
                <span>{{ $t("Title") }}</span>

                <TextInput
                  id="title"
                  type="text"
                  class="mt-1 block w-full"
                  v-model="form.title"
                  required
                  autofocus
                />

                <InputError class="mt-2" :message="form.errors.name" />
              </div>
              <div>
                <span>{{ $t("Discount") }}</span>

                <TextInput
                  id="discount"
                  type="number"
                  class="mt-1 block w-full"
                  v-model="form.discount"
                  required
                />

                <InputError class="mt-2" :message="form.errors.name" />
              </div>
              <div>
                <span>{{ $t("Description") }}</span>

                <TextInput
                  id="description"
                  type="text"
                  class="mt-1 block w-full"
                  v-model="form.description"
                  autocomplete="description"
                />

                <InputError class="mt-2" :message="form.errors.name" />
              </div>
            </div>
            <div class="w-full sm:w-full md:w-1/2 md:ml-2">
              <div class="mb-2">
                <span>{{ $t("Image") }}</span>
                <div class="flex items-center justify-center w-full">
                  <label
                    for="dropzone-file"
                    class="flex flex-col items-center justify-center w-full h-36 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600"
                  >
                    <div
                      class="flex flex-col items-center justify-center pt-5 pb-6"
                    >
                      <svg
                        class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 20 16"
                      >
                        <path
                          stroke="currentColor"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"
                        />
                      </svg>
                      <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                        <span class="font-semibold">{{
                          $t("Click to upload")
                        }}</span>
                      </p>
                      <p class="text-xs text-gray-500 dark:text-gray-400">
                        SVG, PNG, JPG or GIF
                      </p>
                    </div>
                    <input
                      id="dropzone-file"
                      @change="handleFileChange"
                      type="file"
                      class="hidden"
                    />
                  </label>
                </div>
              </div>
              <div
                class="block w-full md:flex h-68 md:44 mt-4 bg-slate-400 rounded-md p-4"
              >
                <div class="h-40 md:w-1/2">
                  <img
                    :src="image"
                    class="h-full w-full max-w-lg mx-auto rounded-md"
                    alt=""
                  />
                </div>
                <span v-if="preview" class="mt-0 md:mt-16">
                  <svg
                    class="w-6 h-6 text-yellow-300 dark:text-white"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    fill="none"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke="currentColor"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="m16 10 3-3m0 0-3-3m3 3H5v3m3 4-3 3m0 0 3 3m-3-3h14v-3"
                    />
                  </svg>
                </span>

                <div v-if="preview" class="h-40 md:w-1/2">
                  <img
                    :src="preview"
                    alt="Image Preview"
                    class="h-full w-full max-w-lg mx-auto rounded-md"
                  />
                </div>
              </div>
            </div>
          </div>

          <div class="flex items-center mt-4">
            <PrimaryButton>
              {{ $t("Save") }}
            </PrimaryButton>
          </div>
        </form>
      </div>
    </div>
  </AdminLayout>
</template>
