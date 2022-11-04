<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";

const props = defineProps({
    datas: Array,
});

console.log(props.datas)
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div
                        class="p-6 bg-white border-b border-gray-200 grid grid-cols-4 gap-4"
                    >
                        <div class="mx-5" v-for="data in datas" :key="data.id">
                            <a-card hoverable style="width: 240px">
                                <template #cover>
                                    <img
                                        class="h-[150px]"
                                        alt="example"
                                        :src="`/storage/images/${data.image}`"
                                    />
                                </template>
                                <a-card-meta :title="data.name">
                                    <template #description>{{
                                        data.name
                                    }}</template>
                                </a-card-meta>
                            </a-card>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
