@props(['budget'])

<details class="group relative inline-block text-left">
    <summary
        class="flex size-9 cursor-pointer list-none items-center justify-center rounded-lg border border-neutral-700 bg-neutral-800 text-neutral-400 transition hover:border-neutral-600 hover:bg-neutral-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-fuchsia-500 [&::-webkit-details-marker]:hidden"
        title="Budget options"
    >
        <svg
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            class="size-5 transition-transform duration-200 group-open:rotate-90"
            aria-hidden="true"
        >
            <circle cx="12" cy="12" r="1" />
            <circle cx="19" cy="12" r="1" />
            <circle cx="5" cy="12" r="1" />
        </svg>

        <span class="sr-only">Budget options</span>
    </summary>

    <div
        class="absolute right-0 z-50 mt-2 w-56 origin-top-right overflow-hidden rounded-xl border border-neutral-700 bg-neutral-900 p-1.5 shadow-2xl shadow-black/30 ring-1 ring-black/20"
    >
        {{-- Show --}}
        <a
            href=""
            class="group/item flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-neutral-300 transition hover:bg-neutral-800 hover:text-white focus:bg-neutral-800 focus:outline-none"
        >
            <span class="flex size-8 shrink-0 items-center justify-center rounded-lg bg-neutral-800 text-neutral-400 transition group-hover/item:bg-neutral-700 group-hover/item:text-fuchsia-400">
                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    class="size-4"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M2.25 12s3.75-6 9.75-6 9.75 6 9.75 6-3.75 6-9.75 6-9.75-6-9.75-6Z"
                    />
                    <circle cx="12" cy="12" r="2.5" />
                </svg>
            </span>

            <span>
                <span class="block font-medium">Show Budget</span>
                <span class="mt-0.5 block text-xs text-neutral-500">
                    View budget details
                </span>
            </span>
        </a>

        {{-- Edit --}}
        <a
            href=""
            class="group/item flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-neutral-300 transition hover:bg-neutral-800 hover:text-white focus:bg-neutral-800 focus:outline-none"
        >
            <span class="flex size-8 shrink-0 items-center justify-center rounded-lg bg-neutral-800 text-neutral-400 transition group-hover/item:bg-neutral-700 group-hover/item:text-fuchsia-400">
                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    class="size-4"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M16.862 4.487a2.25 2.25 0 0 1 3.182 3.182L8.25 19.463 4.5 20.25l.787-3.75L16.862 4.487Z"
                    />
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15 6.75 17.25 9"
                    />
                </svg>
            </span>

            <span>
                <span class="block font-medium">Update Budget</span>
                <span class="mt-0.5 block text-xs text-neutral-500">
                    Edit budget settings
                </span>
            </span>
        </a>

        <div class="my-1.5 border-t border-neutral-800"></div>

        {{-- Delete --}}
        <form
            method="POST"
            action=""
        >
            @csrf
            @method('DELETE')

            <button
                type="submit"
                class="group/item flex w-full items-center gap-3 rounded-lg px-3 py-2.5 text-left text-sm text-red-400 transition hover:bg-red-500/10 hover:text-red-300 focus:bg-red-500/10 focus:outline-none"
            >
                <span class="flex size-8 shrink-0 items-center justify-center rounded-lg bg-red-500/10 text-red-400 transition group-hover/item:bg-red-500/20">
                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        class="size-4"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3 6h18"
                        />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M8 6V4.5A1.5 1.5 0 0 1 9.5 3h5A1.5 1.5 0 0 1 16 4.5V6"
                        />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="m19 6-.75 13.5a1.5 1.5 0 0 1-1.5 1.5h-9.5a1.5 1.5 0 0 1-1.5-1.5L5 6"
                        />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M10 10.5v6M14 10.5v6"
                        />
                    </svg>
                </span>

                <span>
                    <span class="block font-medium">Delete Budget</span>
                    <span class="mt-0.5 block text-xs text-red-400/60">
                        Permanently remove budget
                    </span>
                </span>
            </button>
        </form>
    </div>
</details>
