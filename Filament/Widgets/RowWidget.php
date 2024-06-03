<?php

declare(strict_types=1);
/**
 * @see https://github.com/awcodes/overlook/blob/2.x/src/Widgets/OverlookWidget.php
 */

namespace Modules\Quaeris\Filament\Widgets;

use Filament\Widgets\Widget;

class RowWidget extends Widget
{
    protected static string $view = 'ui::filament.widgets.row';

    protected int|string|array $columnSpan = 'full';

    public array $grid = [];

    public array $widgets = [];
}
