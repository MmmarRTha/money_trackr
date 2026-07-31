<script setup lang="ts">
import {Head, Link} from '@inertiajs/vue3';
import Heading from '@/components/Heading.vue';
import { dashboard } from '@/routes';
import {Button} from "@/components/ui/button";
import {create} from "@/routes/budgets";

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
        <Button as-child size="lg" class="md:w-80 md:mx-auto">
            <Link :href="create()">New Budget</Link>
        </Button>
    </div>
</template>
