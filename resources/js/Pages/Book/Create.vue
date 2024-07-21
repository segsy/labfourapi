<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import TextArea from '@/Components/TextArea.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';


const form = useForm({
    title: '',
    description: '',
    author_id : ''
});

const submit = () => {
    form.post(route("books.store"));
};
</script>
<template>
    <Head title="Create Book" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Book</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <section>
                    <form @submit.prevent="submit" class="mt-6 space-y-6">
                        

                        <div>
                            <InputLabel for="title" value="Title" />

                            <TextInput
                                id="title"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.title"
                                required
                            />

                            <InputError class="mt-2" :message="form.errors.title" />
                        </div>
                        <div>
                            <InputLabel for="description" value="Description" />

                            <TextArea
                                id="description"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.description"
                            />

                            <InputError class="mt-2" :message="form.errors.email" />
                        </div>
                        <div>
                            <InputLabel for="author_id" value="Author Id" />

                            <TextArea
                                id="author_id"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.author_id"
                            />

                            <InputError class="mt-2" :message="form.errors.author_id" />
                        </div>

                        <div class="flex items-center gap-4">
                            <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                            <Transition
                                enter-active-class="transition ease-in-out"
                                enter-from-class="opacity-0"
                                leave-active-class="transition ease-in-out"
                                leave-to-class="opacity-0"
                            >
                                <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                            </Transition>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
