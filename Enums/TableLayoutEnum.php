<?php

declare(strict_types=1);

namespace Modules\UI\Enums;

use Filament\Resources\Pages\ListRecords;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Illuminate\Support\Arr;

enum TableLayoutEnum: string implements HasColor, HasIcon, HasLabel
{
    case GRID = 'grid';
    case LIST = 'list';

    public static function init(): self
    {
        return self::LIST;
    }

    public function getLabel(): string
    {
        return $this->name;
        // return trans('ui::corner-position.'.$this->value.'.label');
    }

    public function getColor(): string
    {
        return match ($this) {
            self::GRID => 'gray',
            self::LIST => 'gray',
        };
    }

    public function getIcon(): string
    {
        return match ($this) {
            self::LIST => 'heroicon-o-list-bullet',
            self::GRID => 'heroicon-o-squares-2x2',
        };
    }

    public function toggle(): self
    {
        // $res = self::LIST === $this ? self::GRID : self::LIST;
        $res = self::GRID === $this ? self::LIST : self::GRID;

        return $res;
    }

    public function isGridLayout(): bool
    {
        return self::GRID === $this;
    }

    public function getTableContentGrid(): ?array
    {
        $res = $this->isGridLayout()
            ? [
                'md' => 2,
                'lg' => 3,
                'xl' => 4,
            ]
            : null;

        return $res;
    }

    public function getTableColumns(): array
    {
        $trace = debug_backtrace();
        /** @var ListRecords $caller */
        $caller = Arr::get($trace, '1.object');

        if (! method_exists($caller, 'getGridTableColumns')) {
            throw new \Exception('method getGridTableColumns not found in ['.get_class($caller).']');
        }
        if (! method_exists($caller, 'getListTableColumns')) {
            throw new \Exception('method getListTableColumns not found in ['.get_class($caller).']');
        }

        $columns = $this->isGridLayout()
            ? $caller->getGridTableColumns()
            : $caller->getListTableColumns();

        return $columns;
    }
}
