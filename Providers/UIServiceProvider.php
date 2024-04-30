<?php

declare(strict_types=1);

namespace Modules\UI\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Config;
use Modules\UI\Services\UIService;
use Modules\Xot\Providers\XotBaseServiceProvider;

/**
 * ---.
 */
class UIServiceProvider extends XotBaseServiceProvider
{
    public string $module_name = 'ui';

    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

    /**
     * Undocumented function.
     */
    public function bootCallback(): void
    {
        // -------
    }

    public function registerCallback(): void
    {
        // $loader = AliasLoader::getInstance();
        // $loader->alias('ui', UIService::class);

        Config::set('blade-icons.sets.default.path', '/Modules/UI/Resources/svg');
    }
}
