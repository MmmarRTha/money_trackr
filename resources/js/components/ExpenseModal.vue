<script setup lang="ts">
import ExpenseForm from '@/components/ExpenseForm.vue';
import type { Budget } from '@/types/budgets';

defineProps<{
    open: boolean;
    budget: Budget;
}>();

const emit = defineEmits<{
    close: [];
}>();

const closeModal = () => {
    emit('close');
};
</script>

<template>
    <Teleport to="body">
        <div v-if="open" class="fixed inset-0 z-50">
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
                        <h3
                            class="mt-10 text-center text-4xl font-black text-fuchsia-400"
                        >
                            New Expense
                        </h3>
                        <ExpenseForm :budget="budget" @close="closeModal" />
                    </div>
                </div>
            </div>
        </div>
    </Teleport>
</template>

<style scoped></style>
