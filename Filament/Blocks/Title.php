<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Modules\Xot\Actions\View\GetViewsSiblingsAndSelfAction;

class Title
{
    public static function make(
        string $name = 'title',
        string $context = 'form',
    ): Block {
        $view = 'ui::components.blocks.title.v1';
        $views = app(GetViewsSiblingsAndSelfAction::class)->execute($view);

        return Block::make($name)
            ->schema(
                [
                    TextInput::make('text')
                        ->required(),

                    Select::make('level')
                        ->options(
                            [
                                'h2' => 'h2',
                                'h3' => 'h3',
                                'h4' => 'h4',
                            ]
                        )
                        ->afterStateHydrated(static fn ($state, $set) => $state || $set('level', 'h2')),

                    Select::make('_tpl')
                        ->label('layout')
                        ->options($views),
                ]
            )
            ->columns('form' === $context ? 2 : 1);
    }
}
