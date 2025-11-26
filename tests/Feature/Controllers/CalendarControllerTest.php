<?php

namespace Tests\Feature\Controllers;

use App\Models\CalendarEvent;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CalendarControllerTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    /** @test */
    public function it_can_get_all_events()
    {
        CalendarEvent::factory()->count(3)->create();

        $response = $this->actingAs($this->user, 'api')
            ->getJson('/api/calendar/events');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data',
            'message',
        ]);
    }

    /** @test */
    public function it_can_get_events_with_date_range()
    {
        CalendarEvent::factory()->count(3)->create();

        $response = $this->actingAs($this->user, 'api')
            ->getJson('/api/calendar/events?start=2024-01-01&end=2024-12-31');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_single_event()
    {
        $event = CalendarEvent::factory()->create();

        $response = $this->actingAs($this->user, 'api')
            ->getJson("/api/calendar/events/{$event->id}");

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                'id',
                'title',
            ],
            'message',
        ]);
    }

    /** @test */
    public function it_can_create_event()
    {
        $eventData = CalendarEvent::factory()->make()->toArray();

        $response = $this->actingAs($this->user, 'api')
            ->postJson('/api/calendar/events', $eventData);

        $response->assertStatus(200);
        $this->assertDatabaseHas('calendar_events', [
            'title' => $eventData['title'],
        ]);
    }

    /** @test */
    public function it_can_update_event()
    {
        $event = CalendarEvent::factory()->create();
        $updateData = ['title' => 'Updated Event Title'];

        $response = $this->actingAs($this->user, 'api')
            ->putJson("/api/calendar/events/{$event->id}", array_merge($event->toArray(), $updateData));

        $response->assertStatus(200);
        $this->assertDatabaseHas('calendar_events', [
            'id' => $event->id,
            'title' => 'Updated Event Title',
        ]);
    }

    /** @test */
    public function it_can_delete_event()
    {
        $event = CalendarEvent::factory()->create();

        $response = $this->actingAs($this->user, 'api')
            ->deleteJson("/api/calendar/events/{$event->id}");

        $response->assertStatus(200);
        $this->assertSoftDeleted('calendar_events', [
            'id' => $event->id,
        ]);
    }

    /** @test */
    public function it_returns_404_when_event_not_found()
    {
        $response = $this->actingAs($this->user, 'api')
            ->getJson('/api/calendar/events/99999');

        $response->assertStatus(404);
    }
}
