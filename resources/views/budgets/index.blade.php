@extends('layouts.app')

@section('title')
    Budgets
@endsection

@section('actions')
    <div class="mt-10 sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-2xl font-bold">Budgets</h1>
            <p class="mt-4 text-lg text-gray-200">All your budgets in one place.</p>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <a
                href="{{ route('dashboard') }}"
                class="rounded-xl border border-neutral-600 bg-neutral-800 px-5 py-2 text-base font-medium text-white transition hover:bg-neutral-700"
            >
                ← Return to Dashboard
            </a>
        </div>
    </div>
@endsection

@section('dashboard-contents')
    <div class="space-y-6">
        @forelse ($budgets as $budget)
            <div class="flex items-center justify-between rounded-lg border border-neutral-700 bg-neutral-900 p-3 transition hover:border-neutral-600">
                <div class="flex flex-col gap-1">
                    <p
                        class="text-xs rounded-br-2xl font-semibold px-3 py-0.5 ring-1 ring-inset mb-2 {{
                            $budget->isGeneral() ? ' bg-fuchsia-500/15 text-fuchsia-300  ring-fuchsia-500/20'
                            : 'bg-sky-500/15 text-sky-300 ring-sky-500/20'
                        }}"
                    >
                        {{ $budget->isGoal() ? 'Project' : 'General' }}
                    </p>
                    <p class="text-xl font-semibold text-neutral-100">{{ $budget->name }}</p>
                </div>

                <div class="flex justify-end">
                    <div class="pr-10 text-2xl font-bold text-fuchsia-500">
                        ${{ number_format($budget->amount, 2) }}
                    </div>
                    <x-budget-dropdown :budget="$budget" />
                    <x-confirm-delete
                        :id="'delete-dialog-'.$budget->id"
                        :title="'Delete Budget: '.$budget->name"
                        message="This action cannot be undone!"
                        :action="route('budgets.destroy', $budget)"
                    />
                </div>
            </div>
        @empty
            <div class="rounded-lg border border-neutral-700 bg-neutral-900 p-10 text-center">
                <p class="text-xl text-neutral-300">No budgets yet.</p>
                <p class="mt-2 text-neutral-500">Create your first budget to start tracking your expenses.</p>
                <a
                    href="{{ route('budgets.create') }}"
                    class="mt-6 inline-block cursor-pointer rounded-lg bg-fuchsia-600 px-5 py-2 text-center text-base font-medium text-white transition hover:bg-fuchsia-700"
                >New Budget</a>
            </div>
        @endforelse
    </div>
@endsection
