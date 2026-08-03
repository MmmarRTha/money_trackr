<script setup lang="ts">
import { Wallet } from '@lucide/vue';
</script>

<template>
    <div class="flex items-center gap-2.5">
        <span
            class="flex h-9 w-9 items-center justify-center rounded-xl bg-fuchsia-600 text-white shadow-sm"
        >
            <Wallet class="h-4.5 w-4.5" />
        </span>
        <span class="text-sm font-semibold tracking-tight">MoneyTrackr</span>
    </div>
</template>
