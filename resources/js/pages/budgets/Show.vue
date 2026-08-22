<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
import AmountDisplay from '@/components/AmountDisplay.vue';
import CircularProgressBar from '@/components/CircularProgressBar.vue';
import ExpenseDropdown from '@/components/ExpenseDropdown.vue';
import ExpenseModal from '@/components/ExpenseModal.vue';
import type { Budget } from '@/types/budgets';
import type { Category } from '@/types/category';
import type { Expense } from '@/types/expense';
import { formatCurrency, formatDate } from '@/utils';

const { budget, categories, spent } = defineProps<{
    budget: Budget;
    categories: Category[];
    spent: string;
}>();

const isExpenseModalOpen = ref(false);
const selectedExpense = ref<Expense | null>(null);
const percentageUsed = computed(() =>
    Number(budget.amount) > 0
        ? (Number(spent) / Number(budget.amount)) * 100
        : 0,
);

const remaining = computed(() => Number(budget.amount) - Number(spent));

const openCreateModal = () => {
    selectedExpense.value = null;
    isExpenseModalOpen.value = true;
};

const openEditModal = (expense: Expense) => {
    selectedExpense.value = expense;
    isExpenseModalOpen.value = true;
};
const closeExpenseModal = () => {
    selectedExpense.value = null;
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
        <CircularProgressBar :percentageUsed="percentageUsed" />
        <div class="space-y-5">
            <AmountDisplay label="Budget" :amount="Number(budget.amount)" />
            <AmountDisplay label="Spent" :amount="Number(spent)" />
            <AmountDisplay label="Remaining" :amount="remaining" />
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
        <div v-if="budget.expenses.length" class="mt-8 space-y-3">
            <div
                v-for="expense in budget.expenses"
                :key="expense.id"
                :class="[
                    'flex items-center justify-between rounded-lg border border-neutral-700 bg-neutral-900 transition hover:border-neutral-600',
                    budget.type === 'general' ? 'px-6 py-3' : 'p-4',
                ]"
            >
                <div class="flex flex-col items-start gap-2">
                    <span
                        v-if="budget.type === 'general'"
                        class="inline-block rounded-full px-3 py-1 text-xs font-light ring-1 ring-inset"
                        :class="expense.category_color"
                    >
                        {{ expense.category_label }}
                    </span>
                    <p class="text-xl font-semibold text-neutral-100">
                        {{ expense.name }}
                    </p>
                </div>

                <div class="flex shrink-0 items-center gap-6">
                    <span
                        class="text-sm text-gray-400"
                        title="Last time this expense was modified"
                    >
                        Updated {{ formatDate(expense.updated_at) }}
                    </span>
                    <div class="text-2xl font-bold text-fuchsia-500">
                        {{ formatCurrency(Number(expense.amount)) }}
                    </div>
                    <ExpenseDropdown
                        :expense="expense"
                        @edit="openEditModal(expense)"
                    />
                </div>
            </div>
        </div>

        <p v-else class="mt-10 text-center text-xl text-gray-300">
            No Expenses.

            <button
                type="button"
                @click="openCreateModal"
                class="text-fuchsia-400 hover:text-fuchsia-300"
            >
                Start by creating one
            </button>
        </p>
    </section>
    <ExpenseModal
        :open="isExpenseModalOpen"
        :budget="budget"
        :categories="categories"
        :expense="selectedExpense"
        @close="closeExpenseModal"
    />
</template>

<style scoped></style>
