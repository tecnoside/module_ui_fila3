<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Widgets;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class HeroWidget extends BaseWidget
{
    // use InteractsWithPageFilters;

    // protected static ?int $sort = 0;

    public string $title = 'no-set';

    public string $icon = '';

    protected static ?string $pollingInterval = null;

    protected function getStats(): array
    {
        return [
            Stat::make('', $this->title)
                // ->description('32k increase '.$startDate)
                // ->descriptionIcon('heroicon-m-arrow-trending-up')
                // ->chart([7, 2, 10, 3, 15, 4, 17])
                // ->color('success')
                ->icon($this->icon),
=======
use Carbon\Carbon;
=======
>>>>>>> 700c8d5 (Lint)
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class HeroWidget extends BaseWidget
{
    // use InteractsWithPageFilters;

    // protected static ?int $sort = 0;

    public string $title = 'no-set';

    protected function getStats(): array
    {
        return [
            Stat::make('', $this->title)
<<<<<<< HEAD
                //->description('32k increase '.$startDate)
                //->descriptionIcon('heroicon-m-arrow-trending-up')
                //->chart([7, 2, 10, 3, 15, 4, 17])
                //->color('success')
                //->icon('heroicon-s-fire')
                ,
>>>>>>> 01a511b (up)
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
<<<<<<< HEAD
<<<<<<< HEAD
}
=======
}
>>>>>>> 01a511b (up)
=======
}
>>>>>>> 700c8d5 (Lint)
