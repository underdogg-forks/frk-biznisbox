<?php

namespace Tests\Feature\Filament\Actions;

use App\Filament\Resources\Admin\Users\Pages\ListUsers;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;
use Tests\TestCase;

class UserActionsTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create([
            'is_admin' => true,
        ]);
    }

    /** @test */
    public function it_can_reset_user_password_through_table_action(): void
    {
        /* arrange */
        $targetUser = User::factory()->create([
            'email' => 'test@example.com',
        ]);
        $oldPasswordHash = $targetUser->password;

        /* act */
        $component = Livewire::actingAs($this->user)
            ->test(ListUsers::class)
            ->callTableAction('resetPassword', $targetUser);

        /* assert */
        $component->assertSuccessful();
        $targetUser->refresh();
        // Password should be changed (hash will be different)
        $this->assertNotEquals($oldPasswordHash, $targetUser->password);
    }

    /** @test */
    public function it_can_disable_user_2fa_through_table_action(): void
    {
        /* arrange */
        $targetUser = User::factory()->create([
            'two_factor_enabled' => true,
            'two_factor_secret' => 'test-secret',
        ]);

        /* act */
        $component = Livewire::actingAs($this->user)
            ->test(ListUsers::class)
            ->callTableAction('disable2FA', $targetUser);

        /* assert */
        $component->assertSuccessful();
        $targetUser->refresh();
        $this->assertFalse($targetUser->two_factor_enabled);
        $this->assertNull($targetUser->two_factor_secret);
    }
}
