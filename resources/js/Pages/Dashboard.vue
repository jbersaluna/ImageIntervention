<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { Link, useForm } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";

const form = useForm({
    name: null,
    file: null,
});

const layout = {
    labelCol: {
        span: 4,
    },
    wrapperCol: {
        span: 10,
    },
};

function uploadFile() {
    form.post("/upload-image");
}
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
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mx-auto">
                            <a-form
                                ref="formRef"
                                name="custom-validation"
                                :model="formState"
                                :rules="rules"
                                v-bind="layout"
                                @finish="handleFinish"
                                @validate="handleValidate"
                                @finishFailed="handleFinishFailed"
                                @submit.prevent="uploadFile"
                            >
                                <a-form-item
                                    has-feedback
                                    label="Image Name"
                                    name="pass"
                                >
                                    <a-input
                                        v-model:value="form.name"
                                        type="text"
                                        autocomplete="off"
                                    />
                                </a-form-item>
                                <a-form-item
                                    has-feedback
                                    label="Upload Image"
                                    name="checkPass"
                                >
                                    <a-input
                                        @input="
                                            form.file = $event.target.files[0]
                                        "
                                        type="file"
                                        autocomplete="off"
                                    />
                                </a-form-item>
                                <a-form-item
                                    :wrapper-col="{ span: 14, offset: 4 }"
                                >
                                    <a-button type="primary" html-type="submit"
                                        >Submit</a-button
                                    >
                                    <a-button
                                        style="margin-left: 10px"
                                        @click="resetForm"
                                        >Reset</a-button
                                    >
                                </a-form-item>
                            </a-form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
