<?php

declare(strict_types=1);

namespace Modules\UI\Providers;

use Modules\Xot\Providers\XotBaseServiceProvider;

/**
 * ---.
 */
final class UIServiceProvider extends XotBaseServiceProvider
{
    public string $module_name = 'setting';

    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;
}
