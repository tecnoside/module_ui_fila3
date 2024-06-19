<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Widgets;

use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class HeroWidget extends BaseWidget
{
    // use InteractsWithPageFilters;

    // protected static ?int $sort = 0;

    public string $title = 'no-set';
<<<<<<< HEAD

    public string $icon = '';

    protected static ?string $pollingInterval = null;
=======
>>>>>>> 700c8d5 (Lint)

    protected function getStats(): array
    {
        return [
            Stat::make('', $this->title)
<<<<<<< HEAD
                ->icon($this->icon),
=======
            // ->description('32k increase '.$startDate)
            // ->descriptionIcon('heroicon-m-arrow-trending-up')
            // ->chart([7, 2, 10, 3, 15, 4, 17])
            // ->color('success')
            // ->icon('heroicon-s-fire')
            ,
>>>>>>> 700c8d5 (Lint)
        ];
    }

    public function getColumns(): int
    {
        return 8;
    }
}
