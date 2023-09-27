<?php 

/**
 * @see RyanChandler\FilamentNavigation\Filament\Fields\NavigationSelect;
 * @see https://github.com/ryangjchandler/filament-navigation
 */
namespace Modules\UI\Filament\Forms\Components;

use Filament\Forms\Components\Select;
//use RyanChandler\FilamentNavigation\Models\Navigation;

class ParentSelect extends Select
{
    protected string $optionValueProperty = 'id';

    protected function setUp(): void
    {
        parent::setUp();

        //dddx($this->getModel());
        $this->options(function (ParentSelect $component) {
            
            //return Navigation::pluck('name', $component->getOptionValueProperty());
            return ['a'=>'a','b'=>'b'];
        });
        
        
    }

    public function getOptionValueProperty(): string
    {
        return $this->optionValueProperty;
    }
}