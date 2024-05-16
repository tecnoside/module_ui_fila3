<?php

declare(strict_types=1);

namespace Modules\UI\Services;

use Modules\Xot\Services\FileService;

class UIService
{
    public static function asset(string $asset): ?string
    {
        return FileService::asset($asset);
    }
}
