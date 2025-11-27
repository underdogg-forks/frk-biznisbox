<?php

namespace Tests\Unit\Services\Admin;

use App\Models\User;
use App\Services\Admin\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    use RefreshDatabase;

    protected UserService $userService;
    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->userService = new UserService();
        $this->user = User::factory()->create([
            'is_admin' => true,
        ]);
    }

    /** @test */
    public function it_can_reset_user_password(): void
    {
        /* arrange */
        $targetUser = User::factory()->create();
        $oldPasswordHash = $targetUser->password;

        /* act */
        $result = $this->userService->resetUserPassword($targetUser->id);

        /* assert */
        $this->assertNotNull($result);
        $targetUser->refresh();
        $this->assertNotEquals($oldPasswordHash, $targetUser->password);
    }

    /** @test */
    public function it_returns_false_when_resetting_password_for_non_existent_user(): void
    {
        /* act */
        $result = $this->userService->resetUserPassword(99999);

        /* assert */
        $this->assertFalse($result);
    }

    /** @test */
    public function it_can_disable_user_2fa(): void
    {
        /* arrange */
        $targetUser = User::factory()->create([
            'two_factor_enabled' => true,
            'two_factor_secret' => 'test-secret',
        ]);

        /* act */
        $result = $this->userService->disableUser2FA($targetUser->id);

        /* assert */
        $this->assertTrue($result);
        $targetUser->refresh();
        $this->assertFalse($targetUser->two_factor_enabled);
        $this->assertNull($targetUser->two_factor_secret);
    }

    /** @test */
    public function it_returns_false_when_disabling_2fa_for_non_existent_user(): void
    {
        /* act */
        $result = $this->userService->disableUser2FA(99999);

        /* assert */
        $this->assertFalse($result);
    }
}
