<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import TextInput from '@/Components/TextInput.vue';
import VueMultiselect from 'vue-multiselect';
import Table from '@/Components/Table.vue';
import TableDataCell from '@/Components/TableDataCell.vue';
import TableHeaderCell from '@/Components/TableHeaderCell.vue';
import TableRow from '@/Components/TableRow.vue';

import { onMounted } from 'vue';


const props = defineProps({
    role:{
        type: Object,
        required: true,
    },
    permissions: Array,
});

const form = useForm ({
    name : props.role.name,
    permissions: [],
});
onMounted(() =>{
    form.permissions =props.role?.permissions;
})
</script>

<template>
    <Head title="Update Role" />

    <AdminLayout>
        <div class="px-8 w-full">
            <div class="">
                 <!-- Path for Back -->
            <div class="text-md font-sans cursor-pointer flex ">
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
              <Link :href="route('roles.index')" :active="false">
                <span class="font-sans">{{ $t("role") }}</span>
              </Link>
            </span>
          </div>
                    <div class="flex hover:text-yellow-700 dark:hover:text-yellow-500 dark:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mt-1">
                            <path fill-rule="evenodd" d="M13.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L11.69 12 4.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z" clip-rule="evenodd" />
                            <path fill-rule="evenodd" d="M19.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 1 1-1.06-1.06L17.69 12l-6.97-6.97a.75.75 0 0 1 1.06-1.06l7.5 7.5Z" clip-rule="evenodd" />
                        </svg>
                        <span class="m-1">
                            
                                <span class="font-sans">{{ $t("Update") }}</span>
                            
                        </span>
                    </div>
                </div>
                
               
            </div>
            <div class="mt-6 bg-slate-200 p-6 rounded-lg">
                <h1 class="pl-4 pb-6 text-xl">{{ $t("Update") }}</h1>
                <form @submit.prevent="$event => form.put(route('roles.update', role.id))">
                    <div>
                        <span>{{ $t("role") }}</span>

                        <TextInput
                            id="name"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.name"
                            autofocus
                            autocomplete="username"
                        />

                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>
                    <div class="mt-2">
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
                    <div class="flex items-center mt-4">
                    
                        <PrimaryButton 
                        >
                           {{ $t("Update") }}
                        </PrimaryButton>
                    </div>
                </form>
                
            </div>

            <!-- <div class="shadow mt-2 overflow-hidden rounded border-b p-6 bg-slate-200 border-gray-200">
                <h1 class="pl-4 pb-6 text-xl">{{ $t("permissionlist") }}</h1>
                <Table class="min-w-full  bg-slate-200">
                    
                    <template #header>
                        <TableRow>
                            <TableHeaderCell class=" rounded-tl-md text-hovercolorBG" >{{ $t("id") }}</TableHeaderCell>
                            <TableHeaderCell class=" text-hovercolorBG">{{ $t("username") }}</TableHeaderCell>
                            <TableHeaderCell class="rounded-tr-md text-hovercolorBG">{{ $t("action") }}</TableHeaderCell>
                        </TableRow> 
                    </template>
                    <template #default>
                        <TableRow v-for="rolePermission in role.permissions" :key="rolePermission.id" class="border-b">
                            <TableDataCell>{{ rolePermission.id }}</TableDataCell>
                            <TableDataCell>{{ rolePermission.name }}</TableDataCell>
                            <TableDataCell>
                        
                                <span class="text-yellow-500 flex">
                                    <Link :href="route('role.permissions.destroy', [role.id, rolePermission.id])" method="DELETE" as="button">
                                       Revoke
                                    </Link>
                                </span>
                            
                            </TableDataCell>
                        </TableRow> 
                    </template>
                </Table>
            </div> -->
        </div>
    </AdminLayout>
</template>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>