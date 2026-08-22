<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpenseRequest;
use App\Models\Budget;
use App\Models\Expense;
use Inertia\Inertia;
use Inertia\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ExpenseController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(ExpenseRequest $request, Budget $budget): RedirectResponse
    {
        $budget->expenses()->create($request->validated());

        return Inertia::flash('success', 'Expense successfully created!')->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExpenseRequest $request, Budget $budget, Expense $expense): Response
    {
        $expense->update($request->validated());

        return Inertia::flash('success', 'Expense successfully updated!')->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense): Response
    {
        //
    }
}
