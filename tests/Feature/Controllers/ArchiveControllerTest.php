<?php

namespace Tests\Feature\Controllers;

use App\Models\Archive;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ArchiveControllerTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    /** @test */
    public function it_can_get_all_documents()
    {
        Archive::factory()->count(3)->create();

        $response = $this->actingAs($this->user, 'api')
            ->getJson('/api/archive/documents');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_single_document()
    {
        $document = Archive::factory()->create();

        $response = $this->actingAs($this->user, 'api')
            ->getJson("/api/archive/documents/{$document->id}");

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_create_document()
    {
        $file = UploadedFile::fake()->create('document.pdf', 1024);
        
        $documentData = [
            'name' => 'Test Document',
            'file' => $file,
        ];

        $response = $this->actingAs($this->user, 'api')
            ->postJson('/api/archive/documents', $documentData);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_update_document()
    {
        $document = Archive::factory()->create();
        $updateData = ['name' => 'Updated Document'];

        $response = $this->actingAs($this->user, 'api')
            ->putJson("/api/archive/documents/{$document->id}", $updateData);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_delete_document()
    {
        $document = Archive::factory()->create();

        $response = $this->actingAs($this->user, 'api')
            ->deleteJson("/api/archive/documents/{$document->id}");

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_restore_document()
    {
        $document = Archive::factory()->create();
        $document->delete();

        $response = $this->actingAs($this->user, 'api')
            ->putJson("/api/archive/documents/{$document->id}/restore");

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_force_delete_document()
    {
        $document = Archive::factory()->create();

        $response = $this->actingAs($this->user, 'api')
            ->putJson("/api/archive/documents/{$document->id}/force-delete");

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_move_document()
    {
        $document = Archive::factory()->create();
        $moveData = ['folder_id' => 2];

        $response = $this->actingAs($this->user, 'api')
            ->putJson("/api/archive/documents/{$document->id}/move", $moveData);

        $response->assertStatus(200);
    }
}
