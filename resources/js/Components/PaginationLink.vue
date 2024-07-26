<script setup>
import { defineProps } from 'vue';

defineProps({
  paginator: {
    type: Object,
    required: true,
  },
});

const makeLabel = (label) => {
  if (label.includes("Previous")) {
    return "<<";
  } else if (label.includes("Next")) {
    return ">>";
  } else {
    return label;
  }
};
</script>

<template>
  <div class="flex justify-between items-start">
    <div class="flex items-center rounded-md overflow-hidden shadow-lg">
      <div v-for="link in paginator.links" :key="link.label">
        <component
          :is="link.url ? 'a' : 'span'"
          :href="link.url"
          v-html="makeLabel(link.label)"
          class="border-x border-slate-50 dark:border-gray-700 w-12 h-12 grid place-items-center bg-white dark:bg-gray-800 hover:bg-gray-300 dark:text-white hover:dark:bg-gray-500 cursor-pointer"
          :class="{
            'hover:bg-slate-300': link.url,
            'text-zinc-400': !link.url,
            'font-bold text-blue-500': link.active,
          }"
        />
      </div>
    </div>
    <p class="text-slate-600 text-sm mt-3 shadow-lg p-3 rounded-md dark:text-white dark:bg-gray-800">
      {{$t('Showing')}} {{ paginator.from }} {{$t('to')}} {{ paginator.to }} {{$t('of')}} {{ paginator.total }}
    </p>
  </div>
</template>
