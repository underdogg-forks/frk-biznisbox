<?php

namespace Tests\Feature\Controllers\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SettingControllerTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->create();
    }

    /** @test */
    public function it_can_get_settings()
    {
        $response = $this->actingAs($this->admin, 'api')
            ->getJson('/api/admin/settings');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_update_settings()
    {
        $settingsData = [
            'company_name' => 'Test Company',
        ];

        $response = $this->actingAs($this->admin, 'api')
            ->putJson('/api/admin/settings', $settingsData);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_company_settings()
    {
        $response = $this->actingAs($this->admin, 'api')
            ->getJson('/api/admin/settings/company');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_update_company_settings()
    {
        $companyData = [
            'name' => 'Updated Company',
        ];

        $response = $this->actingAs($this->admin, 'api')
            ->putJson('/api/admin/settings/company', $companyData);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_numbering_settings()
    {
        $response = $this->actingAs($this->admin, 'api')
            ->getJson('/api/admin/settings/numbering');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_update_numbering_settings()
    {
        $numberingData = [
            'invoice_prefix' => 'INV-',
        ];

        $response = $this->actingAs($this->admin, 'api')
            ->putJson('/api/admin/settings/numbering', $numberingData);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_generate_preview_number()
    {
        $previewData = [
            'type' => 'invoice',
            'prefix' => 'INV-',
        ];

        $response = $this->actingAs($this->admin, 'api')
            ->postJson('/api/admin/settings/number/preview', $previewData);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_email_settings()
    {
        $response = $this->actingAs($this->admin, 'api')
            ->getJson('/api/admin/settings/email');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_update_email_settings()
    {
        $emailData = [
            'mail_from_address' => 'test@example.com',
        ];

        $response = $this->actingAs($this->admin, 'api')
            ->putJson('/api/admin/settings/email', $emailData);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_send_test_email()
    {
        $testData = [
            'email' => 'test@example.com',
        ];

        $response = $this->actingAs($this->admin, 'api')
            ->postJson('/api/admin/settings/email/test', $testData);

        $response->assertStatus(200);
    }
}
