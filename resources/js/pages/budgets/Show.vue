<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import AmountDisplay from '@/components/AmountDisplay.vue';
import ExpenseModal from '@/components/ExpenseModal.vue';
import type { Budget } from '@/types/budgets';
import type { Category } from '@/types/category';

defineProps<{
    budget: Budget;
    categories: Category[];
}>();

const isExpenseModalOpen = ref(false);

const openCreateModal = () => {
    isExpenseModalOpen.value = true;
};

const closeExpenseModal = () => {
    isExpenseModalOpen.value = false;
};
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

    <section
        class="lg:px5 mt-10 rounded-xl bg-gray-800 p-10 shadow-lg shadow-fuchsia-700"
    >
        <div class="flex items-center justify-between">
            <h2 class="text-3xl font-bold">Expenses</h2>
            <button
                type="button"
                @click="openCreateModal"
                class="cursor-pointer rounded-lg border border-fuchsia-400 bg-fuchsia-600 px-5 py-2 text-xl font-bold text-white hover:bg-fuchsia-800"
            >
                New Expense
            </button>
        </div>
        <!--        <div v-if="props.budget.expenses.length" class="mt-8">-->
        <!--            &lt;!&ndash; Expenses table will go here &ndash;&gt;-->
        <!--        </div>-->

        <!--        <p-->
        <!--            v-else-->
        <!--            class="mt-10 text-center text-xl text-gray-300"-->
        <!--        >-->
        <!--            No Expenses.-->

        <!--            <button-->
        <!--                type="button"-->
        <!--                @click="openCreateModal"-->
        <!--                class="text-fuchsia-400 hover:text-fuchsia-300"-->
        <!--            >-->
        <!--                Start by creating one-->
        <!--            </button>-->
        <!--        </p>-->
    </section>
    <ExpenseModal
        :open="isExpenseModalOpen"
        :budget="budget"
        :categories="categories"
        @close="closeExpenseModal"
    />
</template>

<style scoped></style>
