<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Inertia\Response;

class ExpenseController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): Response
    {
        dd('from vue expense form to store laravel resource');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense): Response
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense): Response
    {
        //
    }
}
