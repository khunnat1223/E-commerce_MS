<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import TextArea from "@/Components/TextArea.vue";

import { ref } from "vue";
import { Plus } from "@element-plus/icons-vue";
import { router } from "@inertiajs/vue3";

const props = defineProps({
  staff: Object,
  profile: [],
});

const form = useForm({
    user_id: props.staff.user_id,
  name: props.staff.name,
  sex: props.staff.sex,
  phone: props.staff.phone,
  dob: props.staff.dob,
  dop: props.staff.dop,
  position: props.staff.position,
  salary: props.staff.salary,
  profile:[],
  _method: 'PUT'
});

const preview = ref('');

const handleFileChange = (event) => {
      const file = event.target.files[0];
      if (file) {
        form.profile = file;
        const reader = new FileReader();
        reader.onload = (e) => {
          preview.value = e.target.result;
        };
        reader.readAsDataURL(file);
      }
    };

const staffUpdate = () => {
      form.post(`/admin/staffs/${props.staff.id}`, {
        onFinish: () => {
        //   form.reset();
          preview.value = props.staff.profile ? `/storage/${props.staff.profile}` : null;
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
              <Link :href="route('staffs.index')" :active="false">
                <span class="font-sans">{{ $t("staff") }}</span>
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
          {{ $t("Create") }} / {{ $t("staff") }}
        </h1>
        <form @submit.prevent="staffUpdate">
          <div class="block w-full md:flex ms:block">
            <div class="md:w-1/2 mr-2">
              <div class="mb-2">
                <span>{{ $t("Name") }}</span>
                <TextInput
                  id="name"
                  type="text"
                  class="mt-1 block w-full"
                  v-model="form.name"
                  placeholder="Jonson, Chan Na,...."
                  required
                  autofocus
                />

                <InputError class="mt-2" :message="form.errors.name" />
              </div>
              <div class="flex w-full">
                <div class="mb-2 mr-2 w-1/2">
                  <span>{{ $t("Sex") }}</span>
                  <select
                    v-model="form.sex"
                    id="sex"
                    required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  >
                    <option disabled value="">{{ $t("Select") }}</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                  <InputError class="mt-2" :message="form.errors.name" />
                </div>
                <div class="mb-2 md:ml-2 w-1/2">
                  <span>{{ $t("dob") }}</span>
                  <TextInput
                    v-model="form.dob"
                    type="date"
                    placeholder="MM-DD-YYYY"
                    class="block w-full"
                  />
                  <InputError :message="form.errors.dob" class="mt-2" />
                </div>
              </div>

              <div class="mb-2">
                <span>{{ $t("Phone") }}</span>
                <TextInput
                  id="phone"
                  type="text"
                  class="mt-1 block w-full"
                  placeholder="096-XXX-XXX"
                  v-model="form.phone"
                  autocomplete="0"
                />
                <InputError class="mt-2" :message="form.errors.name" />
              </div>
              <div class="mb-2">
                <span>{{ $t("pob") }}</span>
                <TextArea
                  id="dop"
                  type="text"
                  class="mt-1 block w-full"
                  placeholder="Battambang, Pursat,.."
                  v-model="form.dop"
                  autocomplete="0"
                />
                <InputError class="mt-2" :message="form.errors.salary" />
              </div>
            </div>
            <div class="w-full sm:w-full md:w-1/2">
              <div class="flex w-full">
                <div class="w-full block pr-2">
                    <div class="mb-2 w-full">
                        <span>{{ $t("ID") }}</span>
                        <TextInput
                        id="user_id"
                        type="text"
                        class="mt-1 block w-full"
                        placeholder="Staff-00X"
                        v-model="form.user_id"
                        autocomplete="0"
                        />
                        <InputError :message="form.errors.dob" class="mt-2" />
                    </div>
                    <div class="mb-2 w-full">
                  <span>{{ $t("Position") }}</span>
                  <select
                    v-model="form.position"
                    id="position"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  >
                    <option disabled value="">{{ $t("Select") }}</option>
                    <option value="Admin">Admin</option>
                    <option value="Staff">Staff</option>
                    <option value="Staff">Sale</option>
                  </select>
                  <InputError class="mt-2" :message="form.errors.name" />
                </div>
                <div class="mb-2 w-full">
                        <span>{{ $t("Salary") }}</span>
                        <TextInput
                        id="salary"
                        type="text"
                        class="mt-1 block w-full"
                        placeholder="$500, $1000"
                        v-model="form.salary"
                        autocomplete="0"
                        />
                        <InputError :message="form.errors.dob" class="mt-2" />
                    </div>
                </div>

                <div class="mb-2 md:ml-2 w-full">
                  <div>
                    <span>{{ $t("Image") }}</span>
                    <div
                      v-if="preview"
                      class="mt-1 w-44 h-48 bg-slate-400 rounded-md"
                    >
                      <img
                        :src="preview"
                        alt="Image Preview"
                        class="w-full h-full rounded-md max-w-lg mx-auto"
                      />
                    </div>
                    <div
                     v-else-if="profile"
                      class="mt-1 w-44 h-48 bg-slate-400 rounded-md"
                    >
                      <img
                        :src="profile"
                        alt="Image Preview"
                        class="w-full h-full rounded-md max-w-lg mx-auto"
                      />
                    </div>
                    <div
                    v-else
                        class="mt-1 w-44 h-48 bg-slate-400 rounded-md flex justify-center items-center"
                        >
                        <span>4 X 6</span>
                        </div>



                    <div class="flex items-center w-full">
                      <label
                        for="dropzone-file"
                        class="flex items-center justify-center w-44 mt-2 h-10 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600"
                      >
                        <div
                          class="flex flex-col items-center justify-center pt-5 pb-2"
                        >
                          <svg
                            class="w-6 h-6 mb-4 text-gray-500 dark:text-gray-400"
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
