<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Modules\Xot\Actions\View\GetViewsSiblingsAndSelfAction;

class Hero
{
    public static function make(
        string $name = 'hero',
        string $context = 'form',
    ): Block {
        $view = 'ui::components.blocks.hero.simple';
        $views = app(GetViewsSiblingsAndSelfAction::class)->execute($view);

        return Block::make($name)
            ->schema(
                [
                    TextInput::make('title'),
                    RichEditor::make('text'),
                    Select::make('_tpl')
                        ->label('layout')
                        ->options($views),
                ]
            );
    }
}
