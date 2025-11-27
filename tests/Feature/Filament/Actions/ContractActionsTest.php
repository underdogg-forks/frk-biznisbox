<?php

namespace Tests\Feature\Filament\Actions;

use App\Filament\Resources\Contracts\Pages\ListContracts;
use App\Models\Contract;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ContractActionsTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    /** @test */
    public function it_can_share_contract_through_table_action(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $contract = Contract::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'CNT-001',
        ]);

        /* act */
        $component = Livewire::actingAs($this->user)
            ->test(ListContracts::class)
            ->callTableAction('share', $contract);

        /* assert */
        $component->assertSuccessful();
        $this->assertDatabaseHas('contracts', [
            'id' => $contract->id,
        ]);
        // Share key should be generated
        $contract->refresh();
        $this->assertNotNull($contract->share_key);
    }

    /** @test */
    public function it_can_generate_contract_pdf_through_table_action(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $contract = Contract::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'CNT-002',
        ]);

        /* act */
        $component = Livewire::actingAs($this->user)
            ->test(ListContracts::class)
            ->callTableAction('generatePdf', $contract);

        /* assert */
        $component->assertSuccessful();
    }
}
