<div class="flex flex-col gap-2">
    <label class="font-semibold text-2xl text-white" for="name">Name</label>

    <input
        id="name"
        type="text"
        placeholder="Budget name. E.g. Wedding, House, Graduation, Weekly Budget"
        class="w-full border border-gray-300 p-3 rounded-lg"
        name="name"
    >

    <x-input-error field="name" />
</div>


<div class="flex flex-col gap-2">
    <label class="font-semibold text-2xl text-white" for="amount">Amount</label>

    <input
        id="amount"
        type="number"
        min="0"
        step="1"
        placeholder="Budget amount"
        class="w-full border border-gray-300 p-3 rounded-lg"
        name="amount"
    />
    <x-input-error field="amount" />
</div>

<div class="flex flex-col gap-2">
    <div class="flex gap-2 items-center">
        <label class="font-semibold text-2xl text-white" for="amount">Budget Type</label>
        <div class="relative inline-block group">
            <button
                class="w-5 h-5 flex items-center justify-center rounded-full bg-gray-500 text-white text-sm font-semibold">
                i
            </button>
            <div
                class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 w-52
                rounded-lg bg-gray-900 text-white px-3 py-2
                opacity-0 invisible
                group-hover:opacity-100 group-hover:visible
                group-focus-within:opacity-100 group-focus-within:visible
                transition-all duration-200 space-y-3">
                <p><span class="font-semibold">General Budget</span> lets you track expenses with categories, making it ideal for weekly or monthly budgets.</p>
                <p><span class="font-semibold">Proyect</span> lets you track expenses related to a specific goal, such as a graduation, wedding, or home renovation.</p>
            </div>
        </div>
    </div>


    <select name="type" class="w-full border border-gray-300 p-3 rounded-lg">
        <option value="">Select Budget Type</option>
        <option value="general">General - With Categories</option>
        <option value="goal">Proyect</option>
    </select>

    <x-input-error field="type" />
</div>
