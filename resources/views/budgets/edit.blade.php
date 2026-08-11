@extends('layouts.app')

@section('title')
    Update Budget
@endsection

@section('actions')
    <div class="mt-10 sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-4xl font-bold">Update Budget:</h1>
            <p class="mt-2 text-xl text-gray-500">Make adjustments to your budget</p>
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
    <form method="POST" action="" class="mx-auto mt-14 max-w-2xl space-y-3" novalidate>
        @csrf
        <x-budget-form :budget="$budget" />
        <input
            type="submit"
            value="Save Changes"
            class="w-full cursor-pointer rounded-lg bg-fuchsia-800 p-3 text-xl font-bold text-white hover:bg-fuchsia-950"
        />
    </form>
@endsection
