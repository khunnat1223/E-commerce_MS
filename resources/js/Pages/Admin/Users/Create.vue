<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

import VueMultiselect from "vue-multiselect";
// import { onMounted } from "vue";

defineProps({
  roles:Array,
  permissions:Array,
})
const form = useForm({
  name: "",
  email: "",
  password: "",
  password_confirmation: "",
  roles: [],
  permissions: [],
});

const submit = () => {
  form.post(route("users.store"), {
    onFinish: () => form.reset("password", "password_confirmation"),
  });
};
</script>

<template>
  <AdminLayout>
    <Head title="Create User" />
    <div class="px-8 w-full">
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
            <Link :href="route('users.index')" :active="false">
              <span class="font-sans">{{ $t("user") }}</span>
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
            <Link :href="route('users.create')" :active="false">
              <span class="font-sans">{{ $t("Create") }}</span>
            </Link>
          </span>
        </div>
      </div>

      <div class="mt-6 bg-slate-200 p-6 rounded-lg">
        <h1 class="pl-4 pb-6 text-xl">{{ $t("Create") }}</h1>
        <form @submit.prevent="submit">
          <div>
            <span>{{ $t("Name") }}</span>

            <TextInput
              id="name"
              type="text"
              class="mt-1 block w-full"
              v-model="form.name"
              required
              autofocus
              autocomplete="name"
            />

            <InputError class="mt-2" :message="form.errors.name" />
          </div>

          <div class="mt-4">
            <span>{{ $t("Email") }}</span>
            <TextInput
              id="email"
              type="email"
              class="mt-1 block w-full"
              v-model="form.email"
              required
              autocomplete="username"
            />

            <InputError class="mt-2" :message="form.errors.email" />
          </div>
          <div class="flex w-full justify-between">
            <div class="mt-2 w-full mr-2">
              <span>{{ $t("Password") }}</span>

              <TextInput
                id="password"
                type="password"
                class="mt-1 block w-full"
                v-model="form.password"
                required
                autocomplete="new-password"
              />

              <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-2 w-full ml-2">
              <span>{{ $t("Comfimpassword") }}</span>
              <TextInput
                id="password_confirmation"
                type="password"
                class="mt-1 block w-full"
                v-model="form.password_confirmation"
                required
                autocomplete="new-password"
              />

              <InputError
                class="mt-2"
                :message="form.errors.password_confirmation"
              />
            </div>
           
          </div>
          <div class="flex w-full">
            <div class="mt-2 w-full mr-2">
              <span>{{ $t("role") }}</span>
              <VueMultiselect
                v-model="form.roles"
                :options="roles"
                :multiple="true"
                :close-on-select="true"
                placeholder="Pick some"
                label="name"
                track-by="id"
              />
            </div>
            <div class="mt-2 w-full ml-2">
              <span>{{ $t("permission") }}</span>
              <VueMultiselect
                v-model="form.permissions"
                :options="permissions"
                :multiple="true"
                :close-on-select="true"
                placeholder="Pick some"
                label="name"
                track-by="id"
              />
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
<style src="vue-multiselect/dist/vue-multiselect.css"></style>
