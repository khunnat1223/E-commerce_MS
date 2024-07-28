<script setup>
import Checkbox from "@/Components/Checkbox.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm, usePage } from "@inertiajs/vue3";

const page = usePage();

defineProps({
  canResetPassword: {
    type: Boolean,
  },
  status: {
    type: String,
  },
});

const form = useForm({
  email: "",
  password: "",
  remember: false,
});

const submit = () => {
  form.post(route("login"), {
    onFinish: () => form.reset("password"),
  });
};
</script>

<template>
  <GuestLayout>
    <Head title="Log in" />

    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
      {{ status }}
    </div>

    <div class="md:flex sm:block rounded-lg bg-gray-200 shadow-slate-400 shadow-lg">
      <div class="w-96 p-7">
        <h2 class="text-3xl font-bold  mb-5 text-center">Sign In</h2>
        <form @submit.prevent="submit">
          <div>
            <TextInput
              id="email"
              type="email"
              class=" block w-full"
              v-model="form.email"
              required
              autofocus
               placeholder="Email or phone "
              autocomplete="username"
            />
            <InputError class="mt-2" :message="form.errors.email" />
          </div>

          <div class="mt-4">
            <TextInput
              id="password"
              type="password"
              class=" block w-full"
              v-model="form.password"
               placeholder="Password"
              required
              autocomplete="current-password"
            />
            <InputError class="mt-2" :message="form.errors.password" />
          </div>

          <div class="flex justify-between mt-4">
            <label class="flex items-center">
              <Checkbox name="remember" v-model:checked="form.remember" />
              <span class="ms-2 text-sm text-gray-600 dark:text-gray-400"
                >Remember me</span
              >
            </label>
            <Link
              v-if="canResetPassword"
              :href="route('password.request')"
              class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
            >
              Forgot your password?
            </Link>
          </div>

          <div class="flex items-center justify-center mt-4">
            <button
              class="w-full justify-center h-12 rounded-md bg-[#F7BE38] text-white hover:bg-[#F7BE38]/90 focus:ring-4 focus:outline-none focus:ring-[#F7BE38]/50 font-medium text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#F7BE38]/50 me-2 mb-2"
              :disabled="form.processing"
            >
              Sign In
            </button>
          </div>
          <div class="text-center mt-2">
            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400"
              >Don't have an account?
              <Link
                :href="route('register')"
                type="button"
                class="text-yellow-600 cursor-pointer"
              >
                Signup</Link
              ></span
            >
          </div>
          <div class="flex items-center justify-center my-4">
    <div class="border-t  ms-2 border-gray-300 flex-grow mr-3"></div>
    <span class="text-gray-500 ">or</span>
    <div class="border-t border-gray-300 flex-grow ml-3"></div>
</div>
          <div class="block my-4 w-full">
            <div>
              <a
                class="w-full justify-center h-12 rounded-md bg-blue-600 text-white active:bg-blueGray-50 text-blueGray-700 px-4 py-2 outline-none focus:outline-none mr-1 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-sm ease-linear transition-all duration-150"
                type="button"
                href="/auth/facebook/redirect"
              >
                <svg
                  class="w-6 h-6 text-white dark:text-white"
                  aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  fill="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    fill-rule="evenodd"
                    d="M13.135 6H15V3h-1.865a4.147 4.147 0 0 0-4.142 4.142V9H7v3h2v9.938h3V12h2.021l.592-3H12V6.591A.6.6 0 0 1 12.592 6h.543Z"
                    clip-rule="evenodd"
                  />
                </svg>
                Fackebook
              </a>
            </div>
            <a
              class="w-full justify-center h-12 mt-2 rounded-md bg-white active:bg-blueGray-50 text-blueGray-700 px-4 py-2 outline-none focus:outline-none mr-1 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-sm ease-linear transition-all duration-150"
              type="button"
              href="/auth/google/redirect"
            >
              <img
                alt="..."
                class="w-5 mr-1"
                src="https://demos.creative-tim.com/notus-js/assets/img/google.svg"
              />Google
            </a>
          </div>

          <!-- Form -->
        </form>
      </div>
      <!-- Sign Up Section -->
      <div
        class="w-96 rounded-l-3xl rounded-lg bg-gradient-to-r text-center justify-center from-orange-400 to-yellow-400 text-white p-8"
      >
        <img
           src="/RanyLogo.png"
          class="justify-center w-36 ml-24 mt-4"
          alt=""
        />
        <h2 class="text-2xl font-bold  mb-5 text-center">Hello, Friend!</h2>
        <p class="mb-6 text-center">
          Enter your personal details and start <br> journey with us
        </p>
        <Link
          :href="route('register')"
          type="button"
          class="bg-white text-orange-500 p-2 px-32 rounded-md hover:bg-gray-200 hover:text-gray-800 hover:scale-110 hover:shadow-lg hover:shadow-yellow-300"
        >
          Sign Up</Link
        >
      </div>
    </div>
    <div v-if="page.props.flash.success" class="text-red-500">
      {{ page.props.flash.success }}
    </div>
  </GuestLayout>
</template>
