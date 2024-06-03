<?php
/**
 * @see https://github.com/awcodes/overlook/blob/2.x/src/Widgets/OverlookWidget.php
 */

namespace Modules\Quaeris\Filament\Widgets;

use Exception;
use NumberFormatter;
use Filament\Widgets\Widget;
use Awcodes\Overlook\OverlookPlugin;
use Modules\Quaeris\Actions\Dashboard\StatsAction;
use Awcodes\Overlook\Contracts\CustomizeOverlookWidget;

class RowWidget extends Widget
{
    protected static string $view = 'ui::filament.widgets.row';

    protected int | string | array $columnSpan = 'full';

    public array $grid = [];

    public array $widgets = [];



}
