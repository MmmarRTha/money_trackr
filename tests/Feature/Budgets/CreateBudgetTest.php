<?php

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
