<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    <div>
                        <div class="border-b border-gray-200 bg-white p-6">
                            <form action="#" @submit.prevent="submitForm">
                                <div>
                                    <label
                                        for="html"
                                        class="block text-sm font-medium text-gray-700"
                                        >HTML CODE</label
                                    >
                                    <div class="mt-1">
                                        <textarea
                                            required
                                            v-model="form.html"
                                            rows="10"
                                            name="html"
                                            id="html"
                                            :class="[
                                                form.errors.html
                                                    ? ' border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:outline-none focus:ring-red-500'
                                                    : 'border-gray-300  focus:border-indigo-500 focus:ring-indigo-500 ',
                                                'block w-full rounded-md shadow-sm sm:text-sm',
                                            ]"
                                        />
                                    </div>
                                    <p
                                        class="mt-2 text-sm text-red-600"
                                        v-if="form.errors.html"
                                    >
                                        {{ form.errors.html }}
                                    </p>
                                </div>
                                <div class="pt-5">
                                    <label
                                        for="subject"
                                        class="block text-sm font-medium text-gray-700"
                                        >Subject</label
                                    >
                                    <div class="mt-1">
                                        <input
                                            v-model="form.subject"
                                            required
                                            type="text"
                                            name="subject"
                                            id="subject"
                                            :class="[
                                                form.errors.subject
                                                    ? ' border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:outline-none focus:ring-red-500'
                                                    : 'border-gray-300  focus:border-indigo-500 focus:ring-indigo-500 ',
                                                'block w-full rounded-md shadow-sm sm:text-sm',
                                            ]"
                                            placeholder="Interesting subject here"
                                        />
                                    </div>
                                    <p
                                        class="mt-2 text-sm text-red-600"
                                        v-if="form.errors.subject"
                                    >
                                        {{ form.errors.subject }}
                                    </p>
                                </div>
                                <div class="pt-5">
                                    <label
                                        for="email"
                                        class="block text-sm font-medium text-gray-700"
                                        >Email</label
                                    >
                                    <div class="mt-1">
                                        <input
                                            v-model="form.email"
                                            required
                                            type="email"
                                            name="email"
                                            id="email"
                                            :class="[
                                                form.errors.email
                                                    ? ' border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:outline-none focus:ring-red-500'
                                                    : 'border-gray-300  focus:border-indigo-500 focus:ring-indigo-500 ',
                                                'block w-full rounded-md shadow-sm sm:text-sm',
                                            ]"
                                            placeholder="you@example.com"
                                        />
                                    </div>
                                    <p
                                        class="mt-2 text-sm text-red-600"
                                        v-if="form.errors.email"
                                    >
                                        {{ form.errors.email }}
                                    </p>
                                </div>
                                <div class="pt-5">
                                    <div class="flex justify-end">
                                        <button
                                            @click="formReset"
                                            type="button"
                                            class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                        >
                                            Cancel
                                        </button>
                                        <button
                                            type="submit"
                                            :disabled="form.processing"
                                            class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                        >
                                            Send
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
    html: null,
    subject: null,
    email: null,
});

function formReset() {
    form.reset();
}

function submitForm() {
    form.post(route("email.send"));
}
</script>
