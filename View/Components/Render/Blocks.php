<?php

declare(strict_types=1);

namespace Modules\UI\View\Components\Render;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;
use Modules\Xot\Actions\GetViewAction;

// use Modules\Xot\View\Components\XotBaseComponent;

/**
 * 
 */
class Blocks extends Component
{
    public array $blocks = [];

    public function __construct(
        ?array $blocks = [],
        public ?Model $model = null,
        public string $tpl = 'v1'
    ) {
        if (is_array($blocks)) {
            $this->blocks = $blocks;
        }
    }

    public function render(): Renderable
    {
        /**
         * @phpstan-var view-string
         */
        $view = app(GetViewAction::class)->execute($this->tpl);

        $view_params = [
            'view' => $view,
            'blocks' => $this->blocks,
            'model' => $this->model,
        ];

        return view($view, $view_params);
    }
}
