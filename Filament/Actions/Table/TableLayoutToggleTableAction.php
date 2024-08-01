<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Actions\Table;

use Filament\Tables\Actions\Action;

/**
 * @see https://filamentphp.com/plugins/tgeorgel-table-layout-toggle
 */
class TableLayoutToggleTableAction extends Action
{
    // use NavigationActionLabelTrait;

    public static function getDefaultName(): ?string
    {
        return 'table-layout-toggle-header';
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->translateLabel()
            ->color('gray')
            ->label('')
            // ->label(trans('ui::'.static::getDefaultName().'.label'))
            // ->tooltip(trans('setting::database_connection.actions.database-backup.tooltip'))
            ->icon(fn ($livewire) => $livewire->layoutView->getIcon())
            ->action(
                function ($livewire) {
                    $livewire->layoutView = $livewire->layoutView->toggle();

                    // $livewire->dispatch('$refresh');

                    // $livewire->dispatch('layoutViewChanged');
                    // $livewire->tableLayoutToggle();
                }
            );
    }
}
