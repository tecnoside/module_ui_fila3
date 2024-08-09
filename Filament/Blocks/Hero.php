<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Blocks;

use Illuminate\Support\Arr;
use Filament\Forms\Components\Select;
use Modules\Xot\Services\FileService;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Builder\Block;
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
            return FileService::asset('ui::img/screenshots/'.$view.'.png');

        });

        return Block::make($name)
            ->schema(
                [
                    TextInput::make('title'),
                    RichEditor::make('text'),
                    FileUpload::make('background')
                        //->acceptedFileTypes(['application/pdf'])
                        //->image()
                        ->directory('blocks')
                        ->preserveFilenames()
                        ,
                    //*
                    RadioImage::make('_tpl')
                        ->label('layout')
                        ->options($options)
                    //*/
                    /*
                    Select::make('_tpl')
                        ->label('layout')
                        ->options($views),
                    //*/
                ]
            );
    }
}
