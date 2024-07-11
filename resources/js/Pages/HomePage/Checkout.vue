<!-- <script setup>
import { computed, reactive, ref } from "vue";
import HomeLayout from "@/Layouts/HomeLayout.vue";
import { router, Link, usePage } from "@inertiajs/vue3";

const props = defineProps({
    userAddress: Object,
});

    const form = reactive({
      phone: props.userAddress?.phone,
      address: props.userAddress?.address,
      delivery: props.userAddress?.delivery,
      imagepay: [],

    });


const products = computed(() => usePage().props.cart.products);
const carts = computed(() => usePage().props.cart.items);
const total = computed(() => usePage().props.cart.total);

    const formFilled = computed(() => {
      return (
        form.address !== null &&
        form.phone !== null);
    });

const previewUrl = ref(null);

const onFileChange = (event) => {
  const file = event.target.files[0];
  if (file) {
    form.imagepay = file;
    const reader = new FileReader();
    reader.onload = (e) => {
        previewUrl.value = e.target.result;
    };
    reader.readAsDataURL(file);
  }
};


function submit() {
    router.visit(route('checkout.store'), {
        method: 'post',
        data: {
            carts: usePage().props.cart.items,
            products: usePage().props.cart.products,
            total: usePage().props.cart.total,
            address:form,
            phone: form,
            delivery: form,
            imagepay: imagepay.value,
        }
    })
}





</script> -->
<script setup>
import { computed, reactive, ref } from "vue";
import { router, usePage } from "@inertiajs/vue3";
import HomeLayout from "@/Layouts/HomeLayout.vue";

// Define props
const props = defineProps({
    userAddress: Object,
});

// Initialize form data with reactive
// const form = reactive({
//     phone: props.userAddress?.phone,
//     address: props.userAddress?.address,
//     delivery: props.userAddress?.delivery,
//     imagepay: null,
// });
const form = reactive({
      phone: props.userAddress?.phone || '',
      address: props.userAddress?.address || '',
      delivery: props.userAddress?.delivery || '',
      imagepay:null,

    });

// Computed properties for cart data
const products = computed(() => usePage().props.cart.products);
const carts = computed(() => usePage().props.cart.items);
const total = computed(() => usePage().props.cart.total);

// Check if the form is filled
const formFilled = computed(() => {
    return form.address !== '' && form.phone !== '';
});

// Image preview URL
const previewUrl = ref(null);

// Handle file change event
const onFileChange = (event) => {
    const file = event.target.files[0];
    if (file) {
        form.imagepay = file;
        const reader = new FileReader();
        reader.onload = (e) => {
            previewUrl.value = e.target.result;
        };
        reader.readAsDataURL(file);
    }
};
const Add_infor=()=>{
    alert('Please input Address and Phone Number!');
}

// Submit the form
function submit() {
    const formData = new FormData();
    formData.append('carts', JSON.stringify(carts.value));
    formData.append('products', JSON.stringify(products.value));
    formData.append('total', total.value);
    formData.append('address', form.address);
    formData.append('phone', form.phone);
    formData.append('delivery', form.delivery);

    if (form.imagepay) {
        formData.append('imagepay', form.imagepay);
    }

    router.visit(route('checkout.store'), {
        method: 'post',
        data: formData,
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    });
}
</script>

<template>
    <HomeLayout>
        <div class="pt-2 pb-8 antialiased bg-white dark:bg-gray-900">
            <form
                @submit.prevent="submit"
                action="#"
                class="max-w-screen-xl px-4 mx-auto 2xl:px-0"
                method="post"
                enctype="multipart/form-data"
            >
                <div
                    class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-12 xl:gap-16"
                >
                    <div class="flex-1 min-w-0 space-y-8">
                        <div class="md:space-y-2">
                            <h3
                                class="text-2xl font-semibold text-gray-900 dark:text-white"
                            >
                                Payment
                            </h3>

                            <!-- Test -->

                            <!-- End Tes -->

                            <!-- component -->
                            <div class="text-gray-600 bg-gray-100 body-font">
                                <div
                                    class="container flex flex-wrap justify-center max-w-3xl p-2 mx-auto bg-white dark:bg-slate-900"
                                >
                                    <!-- QR Code Number Account & Uploadfile -->
                                    <div class="flex-wrap md:flex">
                                        <div class="mx-auto">
                                            <img
                                                class="p-2 mx-auto mt-12 border rounded-lg h-52 w-52 md:mt-0"
                                                src="https://qrcg-free-editor.qr-code-generator.com/main/assets/images/websiteQRCode_noFrame.png"
                                                alt="step"
                                            />
                                            <div>
                                                <p
                                                    class="mt-2 font-semibold text-center text-gray-600 dark:text-slate-50"
                                                >
                                                    Sarith Meas
                                                </p>
                                                <p
                                                    class="mt-1 font-medium text-center text-red-500"
                                                >
                                                    040-12-00-01166166-001
                                                </p>
                                            </div>
                                            <!-- QR Upload -->
                                            <div class="mx-auto w-52">
                                                <div class="m-4">
                                                    <div
                                                        class="items-center justify-center w-full"
                                                    >
                                                        <label
                                                            class="flex flex-col w-full h-12 border-4 border-gray-200 border-dashed cursor-pointer hover:border-gray-300 hover:bg-gray-100"
                                                        >
                                                            <div
                                                                class="flex items-center justify-center mt-2 space-x-1"
                                                            >
                                                                <svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    fill="none"
                                                                    viewBox="0 0 24 24"
                                                                    stroke-width="1.5"
                                                                    stroke="currentColor"
                                                                    class="w-6 h-6 text-gray-400"
                                                                >
                                                                    <path
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z"
                                                                    />
                                                                </svg>

                                                                <p
                                                                    class="text-sm tracking-wider text-gray-400 font-laonoto group-hover:text-gray-600"
                                                                >
                                                                    Upload
                                                                </p>
                                                            </div>
                                                            <input
                                                                type="file"
                                                                @change="onFileChange"
                                                                class="opacity-0"
                                                            />
                                                        </label>
                                                        <div v-if="previewUrl">
                                                            <img :src="previewUrl"
                                                                alt="Image Preview"
                                                                class="h-24 py-2 pl-8 ml-1"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Step Checkout -->
                                        <div
                                            class="max-w-sm mt-8 md:mt-0 md:ml-10 md:w-2/3"
                                        >
                                            <div class="relative flex pb-12">
                                                <div
                                                    class="absolute inset-0 flex items-center justify-center w-10 h-full"
                                                >
                                                    <div
                                                        class="w-1 h-full bg-gray-200 pointer-events-none"
                                                    ></div>
                                                </div>
                                                <div
                                                    class="relative z-10 inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-white bg-yellow-500 rounded-full"
                                                >
                                                    <svg
                                                        fill="none"
                                                        stroke="currentColor"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        class="w-5 h-5"
                                                        viewBox="0 0 24 24"
                                                    >
                                                        <path
                                                            d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"
                                                        ></path>
                                                    </svg>
                                                </div>
                                                <div class="flex-grow pl-4">
                                                    <h2
                                                        class="mb-1 text-base font-medium tracking-wider text-gray-900 dark:text-slate-50"
                                                    >
                                                        ជំហានទី១
                                                    </h2>
                                                    <p
                                                        class="text-base leading-relaxed font-laonoto dark:text-gray-400"
                                                    >
                                                        ដំបូងលោកអ្នកស្កេន
                                                        <br />
                                                        <b class="text-sm"
                                                            >QR CODE </b
                                                        >ហើយធ្វើការទូរទាត់
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="relative flex pb-12">
                                                <div
                                                    class="absolute inset-0 flex items-center justify-center w-10 h-full"
                                                >
                                                    <div
                                                        class="w-1 h-full bg-gray-200 pointer-events-none"
                                                    ></div>
                                                </div>
                                                <div
                                                    class="relative z-10 inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-white bg-yellow-500 rounded-full"
                                                >
                                                    <svg
                                                        fill="none"
                                                        stroke="currentColor"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        class="w-5 h-5"
                                                        viewBox="0 0 24 24"
                                                    >
                                                        <path
                                                            d="M22 12h-4l-3 9L9 3l-3 9H2"
                                                        ></path>
                                                    </svg>
                                                </div>
                                                <div class="flex-grow pl-4">
                                                    <h2
                                                        class="mb-1 text-base font-medium tracking-wider text-gray-900 dark:text-slate-50"
                                                    >
                                                        ជំហានទី២
                                                    </h2>
                                                    <p
                                                        class="text-base leading-relaxed font-laonoto dark:text-slate-400"
                                                    >
                                                        Upload វិក្កយបត្រ
                                                        ដែលបានទូរទាត់រួចនោះ
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="relative flex pb-4">
                                                <div
                                                    class="relative z-10 inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-white bg-yellow-500 rounded-full"
                                                >
                                                    <svg
                                                        fill="none"
                                                        stroke="currentColor"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        class="w-5 h-5"
                                                        viewBox="0 0 24 24"
                                                    >
                                                        <circle
                                                            cx="12"
                                                            cy="5"
                                                            r="3"
                                                        ></circle>
                                                        <path
                                                            d="M12 22V8M5 12H2a10 10 0 0020 0h-3"
                                                        ></path>
                                                    </svg>
                                                </div>
                                                <div class="flex-grow pl-4">
                                                    <h2
                                                        class="mb-1 text-base font-medium tracking-wider text-gray-900 title-font dark:text-slate-50"
                                                    >
                                                        ជំហានទី៣
                                                    </h2>
                                                    <p
                                                        class="text-base leading-relaxed font-laonoto dark:text-slate-400"
                                                    >
                                                        ជាចុងក្រោយលោកអ្នកចុះ
                                                        Payments
                                                        <br />ជាការស្រេច
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="flex-grow pl-4">
                                                <p
                                                    class="mb-1 text-base font-medium tracking-wider text-gray-700 dark:text-slate-300"
                                                >
                                                    <u
                                                        class="text-base font-bold text-red-700"
                                                        >ចំណាំ៖</u
                                                    >
                                                    ដើម្បីធ្វើការទូរទាត់តាមរយៈស្កេនលោកអ្នកធ្វើតាមជំហានដូចខាងលើ។
                                                    <br />
                                                    <span
                                                        class="text-slate-400"
                                                    >
                                                        ពត៌មានបន្ថែមសូមទំនាក់ទំនងមកលេខទូរស័ព្ទ
                                                        ឬតេលេក្រាមខាងក្រោម
                                                        <i>សូមអរគុណ!</i></span
                                                    >
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="w-full mt-6 space-y-6 sm:mt-8 lg:mt-0 lg:max-w-xs xl:max-w-md"
                    >
                        <div class="flow-root">
                            <div
                                class="-my-3 divide-y divide-gray-200 dark:divide-gray-800"
                            >
                                <div class="space-y-4">
                                    <div class="space-y-2"

                                    >
                                        <p
                                            class="text-xl text-gray-900 dark:text-white"
                                        >
                                            Billing Address
                                        </p>
                                        <textarea
                                            v-model="form.address"
                                            name="address"
                                            class="w-full h-24 px-3 py-2 text-gray-800 transition duration-100 border rounded outline-none bg-gray-50 focus:ring-yellow-500 focus:border-yellow-500 dark:bg-slate-800 dark:text-slate-100"
                                            placeholder="#26Eo, St.148 S/K Phsar Kandal 1, Khan Daun Penh,Phnom Penh City"
                                        ></textarea>
                                        <p
                                            class="text-xl text-gray-900 dark:text-white"
                                        >
                                            Your Phone Number
                                        </p>
                                        <input
                                         v-model="form.phone"
                                         name="phone"
                                            type="text"
                                            class="w-full px-3 py-2 text-gray-800 transition duration-100 border rounded outline-none bg-gray-50 focus:ring-yellow-500 focus:border-yellow-500 dark:bg-slate-800 dark:text-slate-100"
                                            placeholder="010371277"
                                        />
                                        <p
                                            class="text-xl text-gray-900 dark:text-white"
                                        >
                                            Delivery By
                                        </p>
                                        <input
                                            type="text"
                                            v-model="form.delivery"
                                            class="w-full px-3 py-2 text-gray-800 transition duration-100 border rounded outline-none bg-gray-50 focus:ring-yellow-500 focus:border-yellow-500 dark:bg-slate-800 dark:text-slate-100"
                                            placeholder="J&T, VAT, or ......."
                                        />
                                    </div>

                                    <dl
                                        class="flex items-center justify-between gap-4 pt-2 border-t border-gray-200 dark:border-gray-700"
                                    >
                                        <dt
                                            class="text-base font-bold text-gray-900 dark:text-white"
                                        >
                                            Total
                                        </dt>
                                        <dd
                                            class="text-base font-bold text-gray-900 dark:text-white"
                                        >
                                        <span class="text-lg font-bold">$ {{ total }}</span>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-3">
                            <button
                                v-if="formFilled || userAddress"
                                type="submit"
                                class="flex w-full items-center justify-center rounded-lg bg-yellow-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-yellow-800 focus:outline-none focus:ring-4 focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800"
                            >
                                Payments
                            </button>
                            <Link
                                v-else
                                @click="Add_infor"
                                class="flex w-full cursor-pointer items-center justify-center rounded-lg bg-yellow-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-yellow-800 focus:outline-none focus:ring-4 focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800"
                            >
                            Add Address to Payments
                            </Link>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </HomeLayout>
</template>
