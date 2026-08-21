<script setup lang="ts">
import { computed } from 'vue';

type Props = {
    percentageUsed: number;
    size?: number;
    strokeWidth?: number;
};

const props = withDefaults(defineProps<Props>(), {
    size: 160,
    strokeWidth: 10,
});

const radius = computed(() => (props.size - props.strokeWidth) / 2);

const circumference = computed(() => 2 * Math.PI * radius.value);

const clampedPercentage = computed(() =>
    Math.min(Math.max(props.percentageUsed, 0), 100),
);

const dashOffset = computed(
    () => circumference.value * (1 - clampedPercentage.value / 100),
);

const progressColorClass = computed(() => {
    if (props.percentageUsed < 50) {
        return 'text-emerald-500';
    }

    if (props.percentageUsed <= 80) {
        return 'text-amber-500';
    }

    return 'text-red-500';
});

const label = computed(() => `${props.percentageUsed.toFixed(2)}%`);
</script>

<template>
    <div
        class="relative inline-flex items-center justify-center"
        role="progressbar"
        :aria-valuenow="percentageUsed"
        aria-valuemin="0"
        aria-valuemax="100"
    >
        <svg :width="size" :height="size" class="-rotate-90">
            <circle
                cx="50%"
                cy="50%"
                :r="radius"
                fill="none"
                :stroke-width="strokeWidth"
                class="stroke-neutral-700"
            />
            <circle
                cx="50%"
                cy="50%"
                :r="radius"
                fill="none"
                stroke="currentColor"
                stroke-linecap="round"
                class="transition-[stroke-dashoffset,stroke] duration-700 ease-out"
                :stroke-width="strokeWidth"
                :stroke-dasharray="circumference"
                :stroke-dashoffset="dashOffset"
                :class="progressColorClass"
            />
        </svg>
        <span class="absolute text-3xl font-bold text-white">
            <slot>{{ label }}</slot>
        </span>
    </div>
</template>
