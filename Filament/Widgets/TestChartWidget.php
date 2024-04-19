<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class TestChartWidget extends ChartWidget
{
    // protected static ?string $heading = 'Blog Posts';

    public int $qid = 0;

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Blog posts created '.$this->qid,
                    'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
