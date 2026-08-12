<?php

namespace App\Http\Controllers;

use App\Http\Requests\BudgetRequest;
use App\Models\Budget;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Attributes\Controllers\Authorize;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        /** @var User $user */
        $user = Auth::user();
        $budgets = $user->budgets()->get();

        return view('budgets.index', ['budgets' => $budgets]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('budgets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BudgetRequest $request): RedirectResponse
    {
        Auth::user()->budgets()->create($request->validated());

        return redirect(route('budgets.index'))->with('success', 'Budget created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Budget $budget): View
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    #[Authorize('update', 'budget')]
    public function edit(Budget $budget): View
    {
        return view('budgets.edit', ['budget' => $budget]);
    }

    /**
     * Update the specified resource in storage.
     */
    #[Authorize('update', 'budget')]
    public function update(BudgetRequest $request, Budget $budget): RedirectResponse
    {
        $budget->update($request->validated());

        return redirect()->route('budgets.index')->with('success', 'Budget updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Budget $budget): RedirectResponse
    {
        //
    }
}
