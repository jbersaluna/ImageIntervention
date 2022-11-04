<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { reactive, ref } from "vue";

const formState = reactive({
      pass: '',
      checkPass: '',
      age: undefined,
    });
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
                        <a-form
                            ref="formRef"
                            name="custom-validation"
                            :model="formState"
                            :rules="rules"
                            v-bind="layout"
                            @finish="handleFinish"
                            @validate="handleValidate"
                            @finishFailed="handleFinishFailed"
                        >
                            <a-form-item
                                has-feedback
                                label="Password"
                                name="pass"
                            >
                                <a-input
                                    v-model:value="formState.pass"
                                    type="password"
                                    autocomplete="off"
                                />
                            </a-form-item>
                            <a-form-item
                                has-feedback
                                label="Confirm"
                                name="checkPass"
                            >
                                <a-input
                                    v-model:value="formState.checkPass"
                                    type="password"
                                    autocomplete="off"
                                />
                            </a-form-item>
                            <a-form-item has-feedback label="Age" name="age">
                                <a-input-number v-model:value="formState.age" />
                            </a-form-item>
                            <a-form-item :wrapper-col="{ span: 14, offset: 4 }">
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
    </AuthenticatedLayout>
</template>
