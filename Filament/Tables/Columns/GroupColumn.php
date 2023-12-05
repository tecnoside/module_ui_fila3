<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Tables\Columns;

use Filament\Tables\Columns\Column;

class GroupColumn extends Column
{
    protected string $view = 'ui::filament.tables.columns.group';
    public array $schema = [];

    public function getFields()
    {
        return $this->schema;
    }

    public function schema(array $schema)
    {
        $this->schema = $schema;

        return $this;
    }
}
