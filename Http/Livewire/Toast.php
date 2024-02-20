<?php
/**
 * @see https://github.com/bezhanSalleh/filament-language-switch/blob/main/src/Http/Livewire/FilamentLanguageSwitch.php
 */

namespace BezhanSalleh\FilamentLanguageSwitch\Http\Livewire;

use BezhanSalleh\FilamentLanguageSwitch\Events\LocaleChanged;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Toast extends Component
{


    public function render(): View
    {
        $view = 'ui::livewire.toast';
        $view_params = [
            'view'=>$view,
        ];
        return view($view,$view_params);
    }
}
