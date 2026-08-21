<script setup lang="ts">
import {
    TransitionPresets,
    usePreferredReducedMotion,
    useTransition,
} from '@vueuse/core';
import { computed, onMounted, ref, watch } from 'vue';

type Props = {
    percentageUsed: number;
    size?: number;
    strokeWidth?: number;
};

const props = withDefaults(defineProps<Props>(), {
    size: 160,
    strokeWidth: 10,
});

const ANIMATION_DURATION_MS = 600;

const radius = computed(() => (props.size - props.strokeWidth) / 2);

const circumference = computed(() => 2 * Math.PI * radius.value);

const clampedPercentage = computed(() =>
    Math.min(Math.max(props.percentageUsed, 0), 100),
);

const prefersReducedMotion = usePreferredReducedMotion();

const percentageSource = ref(0);

onMounted(() => {
    percentageSource.value = clampedPercentage.value;
});

watch(clampedPercentage, (value) => {
    percentageSource.value = value;
});

const animatedPercentage = useTransition(percentageSource, {
    duration: computed(() =>
        prefersReducedMotion.value === 'reduce' ? 0 : ANIMATION_DURATION_MS,
    ),
    transition: TransitionPresets.easeOutCubic,
});

const dashOffset = computed(
    () => circumference.value * (1 - animatedPercentage.value / 100),
);

const progressColorClass = computed(() => {
    if (animatedPercentage.value < 50) {
        return 'text-emerald-500';
    }

    if (animatedPercentage.value <= 80) {
        return 'text-amber-500';
    }

    return 'text-red-500';
});

const label = computed(() => `${animatedPercentage.value.toFixed(2)}%`);
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
