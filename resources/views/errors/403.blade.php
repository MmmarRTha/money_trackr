@extends('layouts.app')

@section('title', 'Access denied')

@section('contents')
    <div class="flex min-h-[60vh] flex-col items-center justify-center">
        <h1 class="text-6xl font-bold">403</h1>
        <p class="mt-4 text-xl text-gray-600">
            {{ $exception->getMessage() ?: 'You do not have permission to access this resource.' }}
        </p>
        <a href="{{ route('dashboard') }}" class="mt-6 inline-block rounded-lg bg-purple-950 px-6 py-3 text-white">
            Return to Budgets
        </a>
    </div>
@endsection
