<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Widgets;

use Filament\Widgets\Widget as BaseWidget;

class TestWidget extends BaseWidget
{
    protected static string $view = 'ui::filament.widgets.test-widget';
    public array $widgets = [];
}
