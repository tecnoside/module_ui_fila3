<?php

declare(strict_types=1);

namespace Modules\UI\View\Components\Render;

use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\View\Component;
use Illuminate\View\View;
use Modules\Xot\Actions\Module\GetModuleNameFromModelAction;

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

        $views = ['ui::components.blocks.'.$this->tpl];
        if (null !== $this->model) {
            $module = app(GetModuleNameFromModelAction::class)->execute($this->model);
            $views[] = strtolower($module).'::components.blocks.'.$this->tpl;
        }

        /**
         * @callable
         */
        $callback = static fn (string $view) => view()->exists($view);
        /**
         * @phpstan-var view-string|null
         */
        $view = Arr::first($views, $callback);
        if (null === $view) {
            throw new \Exception('none of these views exists ['.implode(', '.\chr(13), $views).']');
        }
        $view_params = $this->block['data'] ?? [];

        return view($view, $view_params);
    }
}
