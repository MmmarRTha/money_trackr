<script setup lang="ts">
import ExpenseForm from '@/components/ExpenseForm.vue';
import type { Budget } from '@/types/budgets';
import type { Category } from '@/types/category';
import type { Expense } from '@/types/expense';

defineProps<{
    open: boolean;
    budget: Budget;
    categories: Category[];
    expense?: Expense | null;
}>();

const emit = defineEmits<{
    close: [];
}>();

const closeModal = () => {
    emit('close');
};
</script>

<template>
    <Teleport v-if="open" to="body">
        <div class="fixed inset-0 z-50">
            <div class="fixed inset-0 bg-black/80" @click="closeModal"></div>
            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div
                    class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0"
                >
                    <div
                        class="relative w-full max-w-2xl transform overflow-hidden rounded-lg bg-gray-900 px-4 pt-5 pb-4 text-left shadow-xl sm:my-8 sm:p-6"
                        @click.stop
                    >
                        <button
                            type="button"
                            @click="closeModal"
                            class="absolute top-4 right-4 text-2xl text-gray-400 hover:text-white"
                        >
                            &times;
                        </button>
                        <ExpenseForm
                            :budget="budget"
                            :categories="categories"
                            :expense="expense"
                            @close="closeModal"
                        />
                    </div>
                </div>
            </div>
        </div>
    </Teleport>
</template>

<style scoped></style>
