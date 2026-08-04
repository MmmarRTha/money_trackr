@extends('layouts.app')

@section('title')
    Create Budgets
@endsection

@section('actions')
    <div class="sm:flex sm:items-center mt-10">
        <div class="sm:flex-auto">
            <h1 class="font-bold text-3xl">New Budget</h1>
            <p class="mt-2 text-xl text-gray-500">Creating a budget is easy: add a name and an amount.</p>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <a href="{{ route('dashboard') }}"
               class="block w-full cursor-pointer rounded-lg bg-fuchsia-600 px-5 py-3 text-center text-xl font-bold text-white transition hover:bg-fuchsia-700">Return to Dashboard</a>
        </div>
    </div>
@endsection

@section('dashboard-contents')
    <form method="POST" action="{{ route('budgets.store') }}" class="" novalidate>
        @csrf
        <x-budget-form />
        <input type="submit" value='Create Budget'
               class="w-full md:w-80 p-3 rounded-lg bg-fuchsia-600 hover:bg-fuchsia-700 text-white font-bold text-xl cursor-pointer mt-4 transition" />
    </form>
@endsection
