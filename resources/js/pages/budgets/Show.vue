<script setup lang="ts">

import {Head} from "@inertiajs/vue3";
import type { Budget } from "@/types/budgets";

defineProps<{ budget: Budget }>();
</script>

<template>
    <Head :title="`Budget: ${budget.name}`" />
    <section class="sm:flex sm:items-center mt-10">
        <div class="sm:flex-auto">
            <h1 class="font-bold text-3xl">Budget:  {{ budget.name }}</h1>
            <p class="mt-6 text-xl text-gray-200">Manage your budget, add, remove, or update your expenses here.</p>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <a
                href="/budgets"
                class="rounded-xl border border-fuchsia-600 bg-fuchsia-800 px-5 py-3 text-base font-medium text-white transition hover:bg-fuchsia-700"><- Return to Budgets
            </a>
        </div>
    </section>

    <main class='grid grid-cols-1 md:grid-cols-2 items-center gap-20 mt-10'>

        <div class='space-y-5'>
            :D
        </div>
    </main>
</template>

<style scoped>

</style>
