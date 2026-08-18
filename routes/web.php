<?php

use App\Http\Controllers\BudgetController;
use App\Http\Controllers\ExpenseController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');

    Route::resource('budgets', BudgetController::class);
    Route::post('/budgets/{budget}/expenses', [ExpenseController::class, 'store'])->name('expenses.store');
});

require __DIR__.'/settings.php';
