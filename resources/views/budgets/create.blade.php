@extends('layouts.app')

@section('title')
    Create Budgets
@endsection

@section('actions')
    <div class="sm:flex sm:items-center mt-18">
        <div class="sm:flex-auto">
            <h1 class="font-bold text-2xl">New Budget</h1>
            <p class="mt-4 text-lg text-gray-500">Creating a budget is easy: add a name and an amount.</p>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <a href="{{ route('budgets.index') }}"
               class="block w-full cursor-pointer rounded-lg bg-fuchsia-600 px-5 py-3 md:px-3 md:py-2 text-center text-xl md:text-lg font-medium text-white transition hover:bg-fuchsia-700">Return to Budgets</a>
        </div>
    </div>
@endsection

@section('dashboard-contents')
    <form method="POST" action="{{ route('budgets.store') }}" class="" novalidate>
        @csrf
        <x-budget-form />
        <input type="submit" value='Create Budget'
               class="w-full md:w-60 p-3 md:p-2 rounded-lg bg-fuchsia-600 hover:bg-fuchsia-700 text-white font-medium text-xl md:text-lg cursor-pointer mt-8 transition" />
    </form>
@endsection
