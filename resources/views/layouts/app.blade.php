@extends('layouts.base')

@section('contents')
    <div class="mx-auto max-w-2xl p-5 lg:p-10">
        @yield('actions')
    </div>

    <main class="mx-auto mt-2 mb-10 max-w-2xl p-5 lg:p-10">
        @yield('dashboard-contents')
    </main>
@endsection
