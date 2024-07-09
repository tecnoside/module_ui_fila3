<?php

declare(strict_types=1);

namespace Modules\UI\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum CornerPositionEnum: string implements HasLabel, HasColor, HasIcon
{
    case TOP_LEFT = 'top-left';
    case TOP_RIGHT = 'top-right';
    case BOTTOM_LEFT = 'bottom-left';
    case BOTTOM_RIGHT = 'bottom-right';

    public function getLabel(): ?string
    {
        return $this->name;

        // or
        /*
        return match ($this) {
            self::Draft => 'Draft',
            self::Reviewing => 'Reviewing',
            self::Published => 'Published',
            self::Rejected => 'Rejected',
        };
        */
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::TOP_LEFT => 'gray',
            self::TOP_RIGHT => 'gray',
            self::BOTTOM_LEFT => 'gray',
            self::BOTTOM_RIGHT => 'gray',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::TOP_LEFT => 'heroicon-o-arrow-up-left',
            self::TOP_RIGHT => 'heroicon-o-arrow-up-right',
            self::BOTTOM_LEFT => 'heroicon-o-arrow-down-left',
            self::BOTTOM_RIGHT => 'heroicon-o-arrow-down-right',
        };
    }
}
