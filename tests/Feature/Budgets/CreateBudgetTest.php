<?php

use App\Models\Budget;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('validates required fields when creating a budget', function () {
    $user = User::factory()->create([
        'email_verified_at' => now(),
    ]
    );

    $response = $this->actingAs($user)
        ->from(route('budgets.create'))
        ->post(route('budgets.store'), [
            'name' => null,
            'amount' => null,
            'type' => null,
        ]);

    $response->assertRedirect(route('budgets.create'));
    $response->assertSessionHasErrors(['name', 'amount', 'type']);
});

it('does not allow guest budget creation', function () {
    $response = $this->post(route('budgets.store'), [
        'name' => 'Video games',
        'amount' => 950,
        'type' => 'goal',
    ]);

    $response->assertRedirect(route('login'));
});

it('assigns the created budget to the authenticated user', function () {
    $user = User::factory()->create([
        'email_verified_at' => now(),
    ]);

    $this->actingAs($user)->post(route('budgets.store'), [
        'name' => 'New Computer',
        'amount' => 950,
        'type' => 'general',
    ]);

    $this->assertDatabaseHas('budgets', [
        'name' => 'New Computer',
        'amount' => 950,
        'type' => 'general',
        'user_id' => $user->id,
    ]);

    $budget = Budget::first();
    expect($budget->user_id)->toBe($user->id);
});

it('creates a budget and redirects with success message', function () {
    $user = User::factory()->create([
        'email_verified_at' => now(),
    ]);

    $response = $this->actingAs($user)->post(route('budgets.store'), [
        'name' => 'New Computer',
        'amount' => 950,
        'type' => 'general',
    ]);

    $response->assertRedirect(route('budgets.index'));
    $response->assertSessionHas('success', 'Budget successfully created.');

});

it('does not allow unverified users to create budgets', function () {
    $user = User::factory()->create([
        'email_verified_at' => null,
    ]);

    $response = $this->actingAs($user)->post(route('budgets.store'), [
        'name' => 'New Computer',
        'amount' => 950,
        'type' => 'general',
    ]);

    $response->assertRedirect(route('verification.notice'));
});

it('validates amount must be greater than zero', function () {
    $user = User::factory()->create([
        'email_verified_at' => now(),
    ]);

    $response = $this->actingAs($user)
        ->from(route('budgets.create'))
        ->post(route('budgets.store'), [
            'name' => 'New Computer',
            'amount' => 0,
            'type' => 'general',
        ]);

    $response->assertRedirect(route('budgets.create'));
    $response->assertSessionHasErrors(['amount']);

});

it('validates type against allowed values ', function () {
    $user = User::factory()->create([
        'email_verified_at' => now(),
    ]);

    $response = $this->actingAs($user)
        ->from(route('budgets.create'))
        ->post(route('budgets.store'), [
            'name' => 'New Computer',
            'amount' => 950,
            'type' => 'not valid',
        ]);

    $response->assertRedirect(route('budgets.create'));
    $response->assertSessionHasErrors(['type']);
});

it('accepts a valid budget type', function () {
    $user = User::factory()->create([
        'email_verified_at' => now(),
    ]);

    $response = $this->actingAs($user)->post(route('budgets.store'), [
        'name' => 'Office Setup',
        'amount' => 950,
        'type' => 'goal',
    ]);

    $response->assertSessionDoesntHaveErrors();
    $this->assertDatabaseHas('budgets', ['type' => 'goal']);
});
