<?php

declare(strict_types=1);

namespace Modules\UI\View\Components\Render;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

// use Modules\Xot\View\Components\XotBaseComponent;

/**
 * .
 */
class Block extends Component
{
    public function __construct(
        public array $block,
        public string $tpl = 'v1')
    {
    }

    public function render(): Renderable
    {
        $this->tpl = $this->block['type'];
        /**
         * @phpstan-var view-string
         */
        $view = 'ui::components.blocks.'.$this->tpl;

        $view_params = $this->block['data'] ?? [];

        return view($view, $view_params);
    }
}
