<div class="space-y-6">
    <div class="flex flex-col gap-2">
        <label class="text-sm font-semibold text-neutral-200" for="name">Name</label>

        <input
            id="name"
            type="text"
            placeholder="Budget name. E.g. Wedding, House, Graduation, Weekly Budget"
            class="w-full rounded-lg border border-neutral-700 bg-neutral-900 p-3 text-neutral-100 transition placeholder:text-neutral-500 focus:border-fuchsia-500 focus:ring-2 focus:ring-fuchsia-500/30 focus:outline-none"
            name="name"
        >

        <x-input-error field="name" />
    </div>

    <div class="flex flex-col gap-2">
        <label class="text-sm font-semibold text-neutral-200" for="amount">Amount</label>

        <input
            id="amount"
            type="number"
            min="0"
            step="1"
            placeholder="Budget amount"
            class="w-full rounded-lg border border-neutral-700 bg-neutral-900 p-3 text-neutral-100 transition placeholder:text-neutral-500 focus:border-fuchsia-500 focus:ring-2 focus:ring-fuchsia-500/30 focus:outline-none"
            name="amount"
        />
        <x-input-error field="amount" />
    </div>

    <div class="flex flex-col gap-2">
        <div class="flex items-center gap-2">
            <label class="text-sm font-semibold text-neutral-200" for="type">Budget Type</label>
            <div class="group relative inline-block">
                <button
                    type="button"
                    class="flex h-5 w-5 items-center justify-center rounded-full bg-neutral-700 text-xs font-semibold text-neutral-100 transition hover:bg-neutral-600"
                    aria-label="Budget type help"
                >
                    i
                </button>
                <div
                    class="invisible absolute bottom-full left-1/2 mb-2 w-52 -translate-x-1/2 space-y-3 rounded-lg bg-neutral-800 px-3 py-2 text-xs text-neutral-200 opacity-0 shadow-lg transition-all duration-200 group-hover:visible group-hover:opacity-100 group-focus-within:visible group-focus-within:opacity-100"
                >
                    <p><span class="font-semibold">General Budget</span> lets you track expenses with categories, making it ideal for weekly or monthly budgets.</p>
                    <p><span class="font-semibold">Proyect</span> lets you track expenses related to a specific goal, such as a graduation, wedding, or home renovation.</p>
                </div>
            </div>
        </div>

        <select
            id="type"
            name="type"
            class="w-full rounded-lg border border-neutral-700 bg-neutral-900 p-3 text-neutral-100 transition focus:border-fuchsia-500 focus:ring-2 focus:ring-fuchsia-500/30 focus:outline-none"
        >
            <option value="" class="bg-neutral-900">Select Budget Type</option>
            <option value="general" class="bg-neutral-900">General - With Categories</option>
            <option value="goal" class="bg-neutral-900">Proyect</option>
        </select>

        <x-input-error field="type" />
    </div>
</div>
