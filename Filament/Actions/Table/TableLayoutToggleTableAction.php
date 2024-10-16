<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Actions\Table;

use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Session;
use Modules\UI\Enums\TableLayoutEnum;

class TableLayoutToggleTableAction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();
        $current=$this->getCurrentLayout();
        $this
            ->name('tableLayoutToggle')
            ->label('') // Nessuna label, solo tooltip
            ->tooltip($current->getLabel())
            ->color($current->getColor()) // Colore basato sulla sessione
            ->icon($current->getIcon()) // Usa l'icona basata sulla sessione
            ->action(fn ($livewire) => $this->toggleLayout($livewire)) // Esegui il toggle

            ->requiresConfirmation(false); // Non richiede conferma
    }

    protected function toggleLayout($livewire): void
    {
        $currentLayout = $this->getCurrentLayout();
        $newLayout = $currentLayout->toggle(); // Esegui il toggle tra GRID e LIST
        Session::put('table_layout', $newLayout->value); // Salva il layout nella sessione
        // Aggiorna la vista del layout dinamicamente
        $livewire->layoutView=$newLayout;
        $livewire->dispatch('$refresh');
        $livewire->dispatch('refreshTable');
    }

    protected function getCurrentLayout(): TableLayoutEnum
    {
        $layout = Session::get('table_layout', TableLayoutEnum::init()->value); // Recupera il layout dalla sessione
        $res=TableLayoutEnum::TryFrom($layout);
        if($res!=null){
            return $res;
        }
        return TableLayoutEnum::init();
    }


}
