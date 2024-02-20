<?php

declare(strict_types=1);

namespace Modules\UI\View\Components\Render;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\View\Component;
use Modules\Xot\Actions\Module\GetModuleNameFromModelAction;

// use Modules\Xot\View\Components\XotBaseComponent;

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
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
<<<<<<< HEAD
        if ('v1' == $this->tpl) {
=======
        if ($this->tpl == 'v1') {
>>>>>>> master
            $this->tpl = $this->block['type'];
        } else {
            $this->tpl = $this->block['type'].'.'.$this->tpl;
        }

        $views = ['ui::components.blocks.'.$this->tpl];
<<<<<<< HEAD
        if (null !== $this->model) {
=======
        if ($this->model !== null) {
>>>>>>> master
            $module = app(GetModuleNameFromModelAction::class)->execute($this->model);
            $views[] = strtolower($module).'::components.blocks.'.$this->tpl;
        }

        /**
         * @phpstan-var view-string|null
         */
        $view = Arr::first($views, static fn (string $view) => view()->exists($view));
<<<<<<< HEAD
        if (null === $view) {
=======
        if ($view === null) {
>>>>>>> master
            throw new \Exception('none of these views exists ['.implode(', '.chr(13), $views).']');
        }
        $view_params = $this->block['data'] ?? [];

        return view($view, $view_params);
    }
}
