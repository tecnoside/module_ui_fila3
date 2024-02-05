<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\RichEditor;

class Paragraph
{
    public static function make(
        string $name = 'paragraph',
        string $context = 'form',
    ): Block {
        return Block::make($name)
            ->schema(
                [
<<<<<<< HEAD
                    RichEditor::make('text'),
=======
                RichEditor::make('text'),
>>>>>>> 4b2b025 (up)
                ]
            );
    }
}
