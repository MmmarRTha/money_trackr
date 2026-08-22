<script setup lang="ts">
import { Ellipsis, Pencil } from '@lucide/vue';
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu';
import type { Expense } from '@/types/expense';

defineProps<{
    expense: Expense;
}>();

const emit = defineEmits<{
    edit: [expense: Expense];
}>();
</script>

<template>
    <DropdownMenu>
        <DropdownMenuTrigger
            title="Expense options"
            class="flex size-9 cursor-pointer items-center justify-center rounded-lg border border-neutral-700 bg-neutral-800 text-neutral-400 transition hover:border-neutral-600 hover:bg-neutral-700 hover:text-white focus:ring-2 focus:ring-fuchsia-500 focus:outline-none"
        >
            <Ellipsis class="size-5" aria-hidden="true" />
            <span class="sr-only">Expense options</span>
        </DropdownMenuTrigger>

        <DropdownMenuContent
            side="bottom"
            align="end"
            class="w-56 rounded-xl border-neutral-700 bg-neutral-900 p-1.5 shadow-2xl ring-1 shadow-black/30 ring-black/20"
        >
            <DropdownMenuItem
                class="gap-3 rounded-lg px-3 py-2.5 text-sm text-neutral-300 focus:bg-neutral-800 focus:text-white"
                @select="emit('edit', expense)"
            >
                <span
                    class="flex size-8 shrink-0 items-center justify-center rounded-lg bg-neutral-800 text-neutral-400 transition group-hover/item:bg-neutral-700 group-hover/item:text-fuchsia-400"
                >
                    <Pencil class="size-4 text-neutral-400" />
                </span>

                <span>
                    <span class="block font-medium">Update Expense</span>
                    <span class="mt-0.5 block text-xs text-neutral-500">
                        Change expense details
                    </span>
                </span>
            </DropdownMenuItem>
        </DropdownMenuContent>
    </DropdownMenu>
</template>
