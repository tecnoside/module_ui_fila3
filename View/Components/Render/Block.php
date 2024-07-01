<?php

declare(strict_types=1);

namespace Modules\UI\View\Components\Render;

use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\View\Component;
use Illuminate\View\View;
use Modules\Blog\Actions\Block\GetAllBlocksAction;
use Modules\Xot\Actions\Module\GetModuleNameByModelAction;

/**
 * .
 */
class Block extends Component
{
    public function __construct(
        public array $block,
        public ?Model $model = null,
        public string $tpl = 'v1'
    ) {
        $tpl_tmp = Arr::get($this->block, 'data._tpl', null);
        if (\is_string($tpl_tmp)) {
            $this->tpl = $tpl_tmp;
        }
    }

    public function render(): ViewFactory|View
    {
        if (! isset($this->block['type'])) {
            return view('ui::empty');
        }

        if ('v1' === $this->tpl) {
            $this->tpl = $this->block['type'];
        } else {
            $this->tpl = $this->block['type'].'.'.$this->tpl;
        }
        $blocks = app(GetAllBlocksAction::class)->execute();
        $block = Arr::first($blocks, function ($block) {
            return $block['name'] === $this->block['type'];
        });
        $module = Arr::get($block, 'module', 'UI');
        $module_low = Str::lower($module);
        // $backtrace = debug_backtrace();

        // $views = ['ui::components.blocks.'.$this->tpl];
        // if (null !== $this->model) {
        //    $module = app(GetModuleNameByModelAction::class)->execute($this->model);
        //    $views[] = strtolower($module).'::components.blocks.'.$this->tpl;
        // }

        /*
         * @callable
         */
        // $callback = static fn (string $view) => view()->exists($view);
        /*
         * @phpstan-var view-string|null
         */
        // $view = Arr::first($views, $callback);
        // if (null === $view) {
        //    throw new \Exception('none of these views exists ['.implode(', '.\chr(13), $views).']');
        // }
        /**
         * @phpstan-var view-string|null
         */
        $view = $module_low.'::components.blocks.'.$this->tpl;
        if (! view()->exists($view)) {
            throw new \Exception('view not exitst ['.$view.']');
        }
        $view_params = $this->block['data'] ?? [];

        return view($view, $view_params);
    }
}
