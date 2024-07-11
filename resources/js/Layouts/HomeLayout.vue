<script setup>
import { onMounted } from "vue";
import { initFlowbite } from "flowbite";
// import HomeLayout from "@/Layouts/HomeLayout.vue";
onMounted(() => {
  initFlowbite();
});

import Navbar from "@/Layouts/Navbar.vue";
import Footer from "@/Layouts/Footer.vue";
</script>

<template>
  <div>
    <Navbar></Navbar>
  </div>
    <main class="h-auto pt-5 ">
      <slot />
    </main>
  <div class="mt-20">
    <Footer></Footer>
  </div>
</template>
