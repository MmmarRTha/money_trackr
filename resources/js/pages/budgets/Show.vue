<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import AmountDisplay from '@/components/AmountDisplay.vue';
import type { Budget } from '@/types/budgets';

defineProps<{ budget: Budget }>();
</script>

<template>
    <Head :title="`Budget: ${budget.name}`" />
    <section class="mt-10 sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-3xl font-bold">Budget: {{ budget.name }}</h1>
            <p class="mt-6 text-xl text-gray-200">
                Manage your budget, add, remove, or update your expenses here.
            </p>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <a
                href="/budgets"
                class="rounded-xl border border-fuchsia-600 bg-fuchsia-800 px-5 py-3 text-base font-medium text-white transition hover:bg-fuchsia-700"
            >
                &larr; Return to Budgets
            </a>
        </div>
    </section>

    <main class="mt-10 grid grid-cols-1 items-center gap-20 md:grid-cols-2">
        <div class="space-y-5">
            <AmountDisplay label="Budget" :amount="Number(budget.amount)" />
            <AmountDisplay label="Spent" :amount="0" />
            <AmountDisplay label="Remaining" :amount="0" />
        </div>
    </main>
</template>

<style scoped></style>
