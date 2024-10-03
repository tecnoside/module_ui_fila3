<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Modules\Xot\Actions\View\GetViewsSiblingsAndSelfAction;

class Slider
{
    public static function make(
        string $name = 'slider',
        string $context = 'form',
    ): Block {
        $view = 'ui::components.blocks.slider.v1';
        $views = app(GetViewsSiblingsAndSelfAction::class)->execute($view);

        return Block::make($name)
            ->schema(
                [
                    TextInput::make('method')
                        ->label('$_theme->{$method}')
                        ->hint('Inserisci il nome del metodo da richiamare nel tema')
                        ->required(),

                    Select::make('_tpl')
                        ->label('layout')
                        ->options($views),
                    // ->afterStateHydrated(static fn ($state, $set) => $state || $set('level', 'h2')),
                ]
            )
            ->columns('form' === $context ? 2 : 1);
    }
}
