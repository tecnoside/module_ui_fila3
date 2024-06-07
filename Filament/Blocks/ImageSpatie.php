<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Get;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Spatie\MediaLibrary\HasMedia;

class ImageSpatie
{
    public static function make(
        string $name = 'image_spatie',
        string $context = 'form',
    ): Block {
        return Block::make($name)
            ->schema([
                Hidden::make('img_uuid')
                    ->default(fn () => Str::uuid()->toString())
                    ->formatStateUsing(fn ($state) => $state ?? Str::uuid()->toString())
                // ->live()
                ,

                SpatieMediaLibraryFileUpload::make('image')
                    ->live()
                    ->hiddenLabel()
                    ->imagePreviewHeight('666')
                    // ->panelLayout('integrated')
                    // ->imageResizeMode('cover')
                    // ->panelAspectRatio('2:1')
                    ->maxSize(102400)
                    ->disk('local')
                    ->image()
                    ->preserveFilenames()
                    ->openable()
                    ->downloadable()
                    // ->rules(Rule::dimensions()->maxWidth(600)->maxHeight(800))
                    ->collection(fn (Get $get) => $get('img_uuid'))
                    ->afterStateUpdated(
                        function (HasForms $livewire, SpatieMediaLibraryFileUpload $component, TemporaryUploadedFile $state, Get $get, HasMedia $record) {
                            $livewire->validateOnly($component->getStatePath());
                            $res = $record
                                ->addMedia($state)
                                ->withResponsiveImages()
                                ->toMediaCollection($get('img_uuid'));
                        }
                    ),

                TextInput::make('caption'),
            ])
            ->columns('form' === $context ? 2 : 1)
        ;
    }
}
