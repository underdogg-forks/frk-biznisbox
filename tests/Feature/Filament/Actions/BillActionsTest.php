<?php

namespace Tests\Feature\Filament\Actions;

use App\Filament\Resources\Bills\Pages\ListBills;
use App\Models\Bill;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class BillActionsTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    /** @test */
    public function it_can_generate_bill_pdf_through_table_action(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $bill = Bill::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'BILL-001',
        ]);

        /* act */
        $component = Livewire::actingAs($this->user)
            ->test(ListBills::class)
            ->callTableAction('generatePdf', $bill);

        /* assert */
        $component->assertSuccessful();
    }
}
