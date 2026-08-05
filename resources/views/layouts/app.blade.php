@extends("layouts.base")

@section("contents")
    <div class="max-w-2xl mx-auto p-5 lg:p-10">
        @yield("actions")
    </div>

    <main class="mt-2 max-w-2xl mx-auto p-5 lg:p-10 mb-10">
        @yield("dashboard-contents")
    </main>
@endsection
