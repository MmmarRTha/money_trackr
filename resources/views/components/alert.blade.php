@props(['type' => 'success', 'message' => ''])

@php
    $colors = [
        'error' => 'bg-rose-500/10 border-rose-500 text-rose-300',
        'success' => 'bg-fuchsia-500/10	border-fuchsia-500 text-fuchsia-300',
    ];
    $class = $colors[$type] ?? $colors['success'];
@endphp

@if ($message)
    <p class="my-10 text-center border-l-8 py-3 text-sm font-bold uppercase {{ $class }}">{{ $message }}</p>
@endif
