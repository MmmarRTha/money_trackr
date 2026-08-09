@extends('layouts.app')

@section('title')
    Create Budgets
@endsection

@section('actions')
    <div class="mt-18 sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-2xl font-bold">New Budget</h1>
            <p class="mt-4 text-lg text-gray-500">Creating a budget is easy: add a name and an amount.</p>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <a
                href="{{ route('budgets.index') }}"
                class="block w-full cursor-pointer rounded-lg bg-fuchsia-600 px-5 py-3 text-center text-xl font-medium text-white transition hover:bg-fuchsia-700 md:px-3 md:py-2 md:text-lg"
            >Return to Budgets</a>
        </div>
    </div>
@endsection

@section('dashboard-contents')
    <form method="POST" action="{{ route('budgets.store') }}" class="" novalidate>
        @csrf
        <x-budget-form />
        <input
            type="submit"
            value="Create Budget"
            class="mt-8 w-full cursor-pointer rounded-lg bg-fuchsia-600 p-3 text-xl font-medium text-white transition hover:bg-fuchsia-700 md:w-60 md:p-2 md:text-lg"
        />
    </form>
@endsection
