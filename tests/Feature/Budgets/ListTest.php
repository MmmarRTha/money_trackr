<?php

use App\Models\Budget;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('shows an empty state when the user has no budgets', function () {
    $user = User::factory()->create([
        'email_verified_at' => now(),
    ]);

    $response = $this->actingAs($user)->get(route('budgets.index'));
    $response->assertOk();
    $response->assertSee('No budgets yet.');
    $response->assertSee('Create your first budget to start tracking your expenses.');
});

it('only shows the authenticated user\'s budgets', function () {
    $user = User::factory()->create([
        'email_verified_at' => now(),
    ]);

    $otherUser = User::factory()->create([
        'email_verified_at' => now(),
    ]);

    Budget::factory()->for($user)->create([
        'name' => 'My Budget',
    ]);

    Budget::factory()->for($otherUser)->create([
        'name' => 'Other Budget',
    ]);

    $response = $this->actingAs($user)->get(route('budgets.index'));
    $response->assertOk();
    $response->assertSee('My Budget');
    $response->assertDontSee('Other Budget');
});
