<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Actions\Table;

use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Session;
use Modules\UI\Enums\TableLayoutEnum;

/**
 * @see https://filamentphp.com/plugins/tgeorgel-table-layout-toggle
 */
class TableLayoutToggleTableAction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->translateLabel()
            ->color('gray')
            ->label('')
            // ->label(trans('ui::'.static::getDefaultName().'.label'))
            // ->tooltip(trans('setting::database_connection.actions.database-backup.tooltip'))
            ->icon(function ($livewire) {
                // $livewire->layoutView->toggle()->getIcon())
                // $livewire->layoutView = $livewire->layoutView->toggle();
                try {
                    $layoutView = TableLayoutEnum::tryFrom(session('layoutView'));
                } catch (\TypeError $e) {
                    $layoutView = null;
                }
                if (null === $layoutView) {
                    $layoutView = TableLayoutEnum::GRID;
                }
                $livewire->layoutView = $layoutView;

                return $livewire->layoutView->getIcon();
            })
            ->action(
                function ($livewire) {
                    // $livewire->layoutView = $livewire->layoutView->toggle();
                    Session::put('layoutView', $livewire->layoutView->toggle()->value);
                    $livewire->dispatch('$refresh');

                    // $livewire->dispatch('layoutViewChanged');
                    // $livewire->tableLayoutToggle();
                }
            );
    }
    // use NavigationActionLabelTrait;

    public static function getDefaultName(): ?string
    {
        return 'table-layout-toggle-header';
    }
}
