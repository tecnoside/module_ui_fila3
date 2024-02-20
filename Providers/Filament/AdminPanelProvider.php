<?php

declare(strict_types=1);

namespace Modules\UI\Providers\Filament;

use Filament\Panel;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Modules\Xot\Providers\Filament\XotBasePanelProvider;

class AdminPanelProvider extends XotBasePanelProvider
{
    protected string $module = 'UI';

    public function panel(Panel $panel): Panel
    {
        FilamentAsset::register(
            [
                Css::make('filament-navigation-styles', __DIR__.'/../../Resources/dist/plugin.css'),
                Js::make('filament-navigation-scripts', __DIR__.'/../../Resources/dist/plugin.js'),
            ],
            'filament-navigation'
        );

        return parent::panel($panel);
    }
}
