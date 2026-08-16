<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import {
    ArrowRight,
    CircleCheck,
    PiggyBank,
    ReceiptText,
    TrendingDown,
    TrendingUp,
} from '@lucide/vue';
import AppFooter from '@/components/AppFooter.vue';
import AppLogo from '@/components/AppLogo.vue';
import { dashboard, login } from '@/routes';
import { register } from '@/routes';

const features = [
    {
        icon: ReceiptText,
        title: 'Monthly budgets',
        description:
            'Set a budget for every category and see exactly where your money goes each month.',
    },
    {
        icon: TrendingUp,
        title: 'Spending insights',
        description:
            'Spot trends and habits with a clear view of your income versus your expenses.',
    },
    {
        icon: PiggyBank,
        title: 'Savings goals',
        description:
            'Plan ahead and track your progress toward the things that matter most.',
    },
];

const bars = [40, 55, 35, 70, 50, 85, 60, 45, 75, 55, 90, 65];
</script>

<template>
    <Head title="Welcome" />

    <div class="flex min-h-screen flex-col bg-muted/40 dark:bg-background">
        <header
            class="sticky top-0 z-10 border-b bg-background/80 backdrop-blur-md"
        >
            <nav
                class="mx-auto flex w-full max-w-6xl items-center justify-between gap-4 px-6 py-4"
            >
                <AppLogo />
                <div class="flex items-center gap-2">
                    <Link
                        v-if="$page.props.auth.user"
                        :href="dashboard()"
                        class="inline-flex items-center rounded-lg bg-primary px-4 py-2 text-sm font-medium text-primary-foreground shadow-sm transition hover:opacity-90"
                    >
                        Dashboard
                    </Link>
                    <template v-else>
                        <Link
                            :href="login()"
                            class="inline-flex items-center rounded-lg px-4 py-2 text-sm font-medium text-foreground transition hover:bg-muted"
                        >
                            Log in
                        </Link>
                        <Link
                            :href="register()"
                            class="inline-flex items-center gap-1.5 rounded-lg bg-primary px-4 py-2 text-sm font-medium text-primary-foreground shadow-sm transition hover:opacity-90"
                        >
                            Get started
                            <ArrowRight class="h-4 w-4" />
                        </Link>
                    </template>
                </div>
            </nav>
        </header>

        <main class="mx-auto w-full max-w-6xl flex-1 px-6 py-16 lg:py-20">
            <section class="grid items-center gap-14 lg:grid-cols-2 lg:gap-10">
                <div>
                    <span
                        class="inline-flex items-center gap-1.5 rounded-full border bg-card px-3 py-1 text-xs font-medium text-muted-foreground"
                    >
                        <span class="h-1.5 w-1.5 rounded-full bg-fuchsia-500" />
                        Your money, under control
                    </span>
                    <h1
                        class="mt-5 text-4xl font-bold tracking-tight text-foreground sm:text-5xl lg:text-[3.4rem] lg:leading-[1.1]"
                    >
                        Take control of your money.
                    </h1>
                    <p
                        class="mt-5 max-w-md text-lg leading-relaxed text-muted-foreground"
                    >
                        MoneyTrackr helps you track spending, plan monthly
                        budgets, and build savings habits — all in one calm,
                        simple place.
                    </p>
                    <div class="mt-8 flex flex-wrap items-center gap-3">
                        <Link
                            :href="register()"
                            class="inline-flex items-center gap-2 rounded-lg bg-fuchsia-600 px-5 py-2.5 text-sm font-medium text-white shadow-md transition hover:bg-fuchsia-700"
                        >
                            Start tracking free
                            <ArrowRight class="h-4 w-4" />
                        </Link>
                        <Link
                            :href="login()"
                            class="inline-flex items-center gap-2 rounded-lg border bg-card px-5 py-2.5 text-sm font-medium text-foreground transition hover:bg-muted"
                        >
                            Log in
                        </Link>
                    </div>
                    <ul
                        class="mt-8 flex flex-wrap gap-x-6 gap-y-2 text-sm text-muted-foreground"
                    >
                        <li class="flex items-center gap-1.5">
                            <CircleCheck class="h-4 w-4 text-fuchsia-600" />
                            Free to start
                        </li>
                        <li class="flex items-center gap-1.5">
                            <CircleCheck class="h-4 w-4 text-fuchsia-600" />
                            No credit card
                        </li>
                        <li class="flex items-center gap-1.5">
                            <CircleCheck class="h-4 w-4 text-fuchsia-600" />
                            Your data stays yours
                        </li>
                    </ul>
                </div>

                <div class="relative">
                    <div
                        class="absolute -inset-6 -z-10 rounded-[2.5rem] bg-fuchsia-500/10 blur-3xl"
                    />
                    <div
                        class="rounded-3xl border bg-card p-6 shadow-xl sm:p-8"
                    >
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-muted-foreground">
                                    Total balance
                                </p>
                                <p
                                    class="mt-1 text-3xl font-bold tracking-tight text-foreground sm:text-4xl"
                                >
                                    $12,480.50
                                </p>
                            </div>
                            <span
                                class="flex h-11 w-11 items-center justify-center rounded-xl bg-fuchsia-600/10 text-fuchsia-600"
                            >
                                <PiggyBank class="h-5.5 w-5.5" />
                            </span>
                        </div>

                        <div class="mt-8 grid grid-cols-2 gap-4">
                            <div class="rounded-2xl bg-muted/60 p-4">
                                <div
                                    class="flex items-center gap-1.5 text-sm text-muted-foreground"
                                >
                                    <TrendingUp
                                        class="h-4 w-4 text-fuchsia-600"
                                    />
                                    Income
                                </div>
                                <p
                                    class="mt-2 text-lg font-semibold text-foreground"
                                >
                                    $6,240.00
                                </p>
                            </div>
                            <div class="rounded-2xl bg-muted/60 p-4">
                                <div
                                    class="flex items-center gap-1.5 text-sm text-muted-foreground"
                                >
                                    <TrendingDown
                                        class="h-4 w-4 text-rose-500"
                                    />
                                    Expenses
                                </div>
                                <p
                                    class="mt-2 text-lg font-semibold text-foreground"
                                >
                                    $3,980.00
                                </p>
                            </div>
                        </div>

                        <div class="mt-6">
                            <p class="mb-3 text-sm text-muted-foreground">
                                Spending this month
                            </p>
                            <div class="flex h-28 items-end gap-2">
                                <div
                                    v-for="(height, index) in bars"
                                    :key="index"
                                    class="flex-1 rounded-t-md bg-fuchsia-600/70 transition-all"
                                    :style="{ height: height + '%' }"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section
                class="mt-20 grid gap-6 sm:grid-cols-2 lg:mt-28 lg:grid-cols-3"
            >
                <div
                    v-for="feature in features"
                    :key="feature.title"
                    class="group rounded-2xl border bg-card p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-md"
                >
                    <span
                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-fuchsia-600/10 text-fuchsia-600"
                    >
                        <component :is="feature.icon" class="h-5 w-5" />
                    </span>
                    <h3 class="mt-4 text-base font-semibold text-foreground">
                        {{ feature.title }}
                    </h3>
                    <p
                        class="mt-2 text-sm leading-relaxed text-muted-foreground"
                    >
                        {{ feature.description }}
                    </p>
                </div>
            </section>
        </main>

        <AppFooter />
    </div>
</template>
