<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import { computed } from 'vue';
import InputError from '@/components/InputError.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from '@/components/ui/select';
import { Spinner } from '@/components/ui/spinner';
import type { Budget } from '@/types/budgets';
import type { Category } from '@/types/category';
import type { Expense } from '@/types/expense';

const props = defineProps<{
    budget: Budget;
    categories: Category[];
    expense?: Expense | null;
}>();

const emit = defineEmits<{
    close: [];
}>();

const isUpdate = computed(() => Boolean(props.expense));

const form = useForm({
    name: props.expense?.name ?? '',
    amount: props.expense?.amount ?? '',
    category: props.expense?.category ?? '',
});

const heading = computed(() =>
    isUpdate.value ? 'Update Expense' : 'New Expense',
);

const submitLabel = computed(() =>
    form.processing
        ? 'Saving...'
        : isUpdate.value
          ? 'Save Changes'
          : 'Add Expense',
);

const submit = () => {
    const onSuccess = () => {
        form.reset();
        emit('close');
    };

    if (isUpdate.value && props.expense) {
        form.put(`/budgets/${props.budget.id}/expenses/${props.expense.id}`, {
            onSuccess,
        });
    } else {
        form.post(`/budgets/${props.budget.id}/expenses`, { onSuccess });
    }
};
</script>

<template>
    <h3 class="mt-10 text-center text-4xl font-black text-fuchsia-400">
        {{ heading }}
    </h3>
    <form @submit.prevent="submit" class="flex flex-col gap-8 p-8">
        <div class="grid gap-3">
            <Label class="text-xl font-bold" for="name">Expense Name:</Label>
            <Input
                id="name"
                v-model="form.name"
                type="text"
                name="name"
                required
                placeholder="Expense name"
            />
            <InputError :message="form.errors.name" />
        </div>

        <div class="grid gap-3">
            <Label class="text-xl font-bold" for="amount"
                >Expense Amount:</Label
            >
            <Input
                id="amount"
                v-model="form.amount"
                type="number"
                name="amount"
                required
                step="0.01"
                min="0"
                placeholder="0.00"
            />
            <InputError :message="form.errors.amount" />
        </div>

        <div v-if="budget.type === 'general'" class="grid gap-3">
            <Label class="text-xl" for="category">Category:</Label>
            <Select v-model="form.category">
                <SelectTrigger class="w-full">
                    <SelectValue placeholder="Select a category" />
                </SelectTrigger>
                <SelectContent>
                    <SelectItem
                        v-for="cat in categories"
                        :key="cat.value"
                        :value="cat.value"
                    >
                        {{ cat.label }}
                    </SelectItem>
                </SelectContent>
            </Select>
            <InputError :message="form.errors.category" />
        </div>

        <Button
            type="submit"
            class="rounded-lg border border-b-fuchsia-400 bg-fuchsia-600 text-xl font-bold text-white"
            :disabled="form.processing"
        >
            <Spinner v-if="form.processing" />
            {{ submitLabel }}
        </Button>
    </form>
</template>

<style scoped></style>
