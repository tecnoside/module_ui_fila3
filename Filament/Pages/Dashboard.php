<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Pages;

use Filament\Pages\Page;
use Modules\UI\Filament\Widgets;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static string $view = 'ui::filament.pages.dashboard';

    protected function getHeaderWidgets(): array
    {
        $widgets = [
            [
                'class' => Widgets\TestChartWidget::class,
                'properties' => ['qid' => 5],
            ],
            [
                'class' => Widgets\TestChartWidget::class,
                'properties' => ['qid' => 7],
            ],
            [
                'class' => Widgets\TestChartWidget::class,
                'properties' => ['qid' => 9],
            ],
            // Widgets\StatsOverviewWidget::class,
            // Widgets\StatsOverviewWidget::class,
            // Widgets\TestChartWidget::make(['qid' => 5]),
            // Widgets\TestChartWidget::make(['qid' => 7]),
            // Widgets\StatsOverviewWidget::make(),
        ];

        return [
            // Widgets\TestChartWidget::make(['qid' => 5]),
            // Widgets\TestChartWidget::make(['qid' => 6]),
            // Widgets\StatsOverviewWidget::class,
            Widgets\TestWidget::make(['widgets' => $widgets]),
            Widgets\TestWidget::make(['widgets' => $widgets]),
            Widgets\TestWidget::make(['widgets' => $widgets]),
            Widgets\TestWidget::make(['widgets' => $widgets]),
        ];
    }
}
