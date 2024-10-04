<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Widgets;

use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\Widget as BaseWidget;

class GroupWidget extends BaseWidget
{
    use InteractsWithPageFilters;

    public array $widgets = [];

    public string $title = '';

    public string $icon = '';

    protected static ?string $pollingInterval = null;

    protected static string $view = 'ui::filament.widgets.group';
}
