<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Arr;
use Modules\UI\Filament\Forms\Components\RadioImage;
use Modules\Xot\Actions\View\GetViewsSiblingsAndSelfAction;

class Hero
{
    public static function make(
        string $name = 'hero',
        string $context = 'form',
    ): Block {
        $view = 'ui::components.blocks.hero.simple';
        $views = app(GetViewsSiblingsAndSelfAction::class)->execute($view);
        $options = Arr::map($views, function ($view) {
            return app(\Modules\Xot\Actions\File\AssetAction::class)->execute('ui::img/screenshots/'.$view.'.png');
        });

        return Block::make($name)
            ->schema(
                [
                    TextInput::make('title'),
                    RichEditor::make('text'),
                    FileUpload::make('background')
                        // ->acceptedFileTypes(['application/pdf'])
                        // ->image()
                        ->directory('blocks')
                        ->preserveFilenames(),
                    // *
                    RadioImage::make('_tpl')
                        ->label('layout')
                        ->options($options),
                    // */
                    /*
                    Select::make('_tpl')
                        ->label('layout')
                        ->options($views),
                    //*/
                    Repeater::make('buttons')
                        ->schema([
                            TextInput::make('label')->required(),
                            TextInput::make('class'),
                            TextInput::make('link'),
                        ])
                        ->columns(3),
                ]
            );
    }
}
