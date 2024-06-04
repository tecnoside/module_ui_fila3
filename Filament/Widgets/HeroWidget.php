<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Widgets;

use Carbon\Carbon;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Number;

class HeroWidget extends BaseWidget
{
    //use InteractsWithPageFilters;

    //protected static ?int $sort = 0;

    public string $title='no-set';
    public string $icon='';

    public string $icon = '';

    protected static ?string $pollingInterval = null;

    protected function getStats(): array
    {
        
        return [
            Stat::make('', $this->title)
<<<<<<< HEAD
                // ->description('32k increase '.$startDate)
                // ->descriptionIcon('heroicon-m-arrow-trending-up')
                // ->chart([7, 2, 10, 3, 15, 4, 17])
                // ->color('success')
                ->icon($this->icon),

            // ->description('32k increase '.$startDate)
            // ->descriptionIcon('heroicon-m-arrow-trending-up')
            // ->chart([7, 2, 10, 3, 15, 4, 17])
            // ->color('success')
            // ->icon('heroicon-s-fire')
=======
                //->description('32k increase '.$startDate)
                //->descriptionIcon('heroicon-m-arrow-trending-up')
                //->chart([7, 2, 10, 3, 15, 4, 17])
                //->color('success')
                ->icon($this->icon)
                ,
>>>>>>> da7aac2 (up)
        ];
    }

    public function getColumns(): int
    {
        return 8;
    }
}