@extends('layouts.app')

@section('title')
    Budgets
@endsection

@section('actions')
    <div class="sm:flex sm:items-center mt-10">
        <div class="sm:flex-auto">
            <h1 class="font-bold text-2xl">Budgets</h1>
            <p class="mt-4 text-lg text-gray-200">All your budgets in one place.</p>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <a href="{{ route('dashboard') }}"
               class="rounded-xl border border-neutral-600 bg-neutral-800 px-5 py-2 text-base font-medium text-white transition hover:bg-neutral-700">
                ← Return to Dashboard
            </a>
        </div>
    </div>
@endsection

@section('dashboard-contents')
    <div class="space-y-6">
        @forelse($budgets as $budget)
            <div class="flex items-center justify-between rounded-lg border border-neutral-700 bg-neutral-900 p-5 transition hover:border-neutral-600">
                <div class="flex flex-col gap-1">
                    <span class="text-xl font-semibold text-neutral-100">{{ $budget->name }}</span>
                    <span class="text-sm text-neutral-400">
                        {{ $budget->type === 'goal' ? 'Proyect' : 'General - With Categories' }}
                    </span>
                </div>
                <div class="text-2xl font-bold text-fuchsia-500">
                    ${{ number_format($budget->amount, 2) }}
                </div>
            </div>
        @empty
            <div class="rounded-lg border border-neutral-700 bg-neutral-900 p-10 text-center">
                <p class="text-xl text-neutral-300">No budgets yet.</p>
                <p class="mt-2 text-neutral-500">Create your first budget to start tracking your expenses.</p>
                <a href="{{ route('budgets.create') }}"
                   class="mt-6 inline-block cursor-pointer rounded-lg bg-fuchsia-600 px-5 py-2 text-center text-base font-medium text-white transition hover:bg-fuchsia-700">New Budget</a>
            </div>
        @endforelse
    </div>
@endsection
