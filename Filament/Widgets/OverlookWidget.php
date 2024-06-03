<?php
/**
 * @see https://github.com/awcodes/overlook/blob/2.x/src/Widgets/OverlookWidget.php
 */

namespace Modules\UI\Filament\Widgets;

use Exception;
use NumberFormatter;
use Filament\Widgets\Widget;
use Awcodes\Overlook\OverlookPlugin;
use Modules\Quaeris\Actions\Dashboard\StatsAction;
use Awcodes\Overlook\Contracts\CustomizeOverlookWidget;

class OverlookWidget extends Widget
{
    protected static string $view = 'ui::filament.widgets.overlook';

    protected int | string | array $columnSpan = 1;

    public string $icon='heroicon-o-envelope';
    public string $title='';


/*
    public array $grid = [
                'default' => 6,
                'sm' => 6,
                'md' => 6,
                'lg' => 6,
                'xl' => 6,
                '2xl' => null,
            ];
            */

    public array $stats=[];

    /*
    public function mount(array $filter): void
    {
        $this->filter = $filter;

        $this->data = $this->getData();
        // dddx($this->data);
        if (empty($this->grid)) {
            $this->grid = [
                'default' => 2,
                'sm' => 2,
                'md' => 3,
                'lg' => 3,
                'xl' => 3,
                '2xl' => null,
            ];
        }
    }
    */


}
