<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Filters;

use Filament\Forms\Components\Select;
use Filament\Tables\Filters\SelectFilter as BaseSelectFilter;

class DeferredSelectFilter extends BaseSelectFilter
{
    public function getFormField(): Select
    {
        return parent::getFormSelectComponent()
            ->stateBindingModifiers(['defer']);
    }
}
