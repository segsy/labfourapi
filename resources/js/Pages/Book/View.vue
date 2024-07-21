<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const props = defineProps({
    book : Object
});

</script>
<template>
    <Head :title="props.book.title" />
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <h1 class="text-2xl">{{props.book.title}}</h1>
                <div>
                    {{props.book.description}}
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
