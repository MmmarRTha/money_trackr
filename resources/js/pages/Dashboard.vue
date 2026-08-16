<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import Heading from '@/components/Heading.vue';
import { Button } from '@/components/ui/button';
import { dashboard } from '@/routes';

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Dashboard',
                href: dashboard(),
            },
        ],
    },
});
</script>

<template>
    <Head title="Dashboard" />

    <div
        class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4"
    >
        <Heading
            title="Manage your budgets"
            description="Create and manage your monthly budgets"
        />
        <Button
            as-child
            size="lg"
            class="bg-fuchsia-600 text-lg font-medium text-white hover:bg-fuchsia-700 md:mx-auto md:w-80"
        >
            <a href="/budgets/create">New Budget</a>
        </Button>
    </div>
</template>
