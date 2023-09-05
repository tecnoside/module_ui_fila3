<?php

declare(strict_types=1);

namespace Modules\UI\Providers\Filament;

use Modules\Xot\Providers\Filament\XotBasePanelProvider;

final class AdminPanelProvider extends XotBasePanelProvider
{
    protected string $module = 'UI';
}
