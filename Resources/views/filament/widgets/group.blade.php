<x-filament-widgets::widget>
<<<<<<< HEAD
    <x-filament::section collapsible icon="{{ $icon }}">
        <x-slot name="description">
            {{ $title }}
        </x-slot>
        @if (count($widgets) == 1)
=======
    <x-filament::section collapsible
        icon="{{ $icon }}"
        >
        <x-slot name="heading">
            {{ $title }}
        </x-slot>
        @if(count($widgets)==1)
>>>>>>> 2e08643 (up)
            @livewire($widgets[0]['class'], $widgets[0]['properties'])
        @endif


        @if (count($widgets) == 3)
            <x-filament::grid lg='2'>
                <x-filament::grid.column>
                    @livewire($widgets[0]['class'], $widgets[0]['properties'])

                </x-filament::grid.column>
                <x-filament::grid.column>
                    @livewire($widgets[1]['class'], $widgets[1]['properties'])<br />
                    @livewire($widgets[2]['class'], $widgets[2]['properties'])
                </x-filament::grid.column>
            </x-filament::grid>
        @endif
    </x-filament::section>
</x-filament-widgets::widget>
