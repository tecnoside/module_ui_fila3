<?php

declare(strict_types=1);

namespace Modules\UI\View\Components\Render;

use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\View\Component;
use Illuminate\View\View;
use Modules\UI\Actions\Block\GetAllBlocksAction;

/**
 * .
 */
class Block extends Component
{
    public function __construct(
        public array $block,
        public ?Model $model = null,
        public string $tpl = 'v1',
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
            return $block->name === $this->block['type'];
        });
        $module = $block->module ?? 'UI';
        $module_low = Str::lower($module);

        $view = $module_low.'::components.blocks.'.$this->tpl;
        if (! view()->exists((string) $view)) {
            // throw new \Exception();
            $message = 'view not exists ['.$view.']';
            $view_params = [
                'title' => 'deprecated',
                'message' => $message,
            ];

            return view('ui::alert', $view_params);
        }
        $view_params = $this->block['data'] ?? [];

        return view($view, $view_params);
    }
}
