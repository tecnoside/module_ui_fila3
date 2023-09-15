<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Pages;

use Filament\Pages\Page;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static string $view = 'ui::filament.pages.dashboard';
}
