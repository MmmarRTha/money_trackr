<script setup lang="ts">
import { formatCurrency } from '@/utils';

type Props = {
    label: string;
    amount: number;
};
defineProps<Props>();
</script>

<template>
    <p class="text-2xl font-bold text-fuchsia-400">
        {{ label }}:
        <span class="font-black text-white">
            {{ formatCurrency(amount) }}
        </span>
    </p>
</template>
