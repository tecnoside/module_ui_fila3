<x-filament-widgets::widget>
    <x-filament::section collapsible icon="{{ $icon }}">
        <x-slot name="description">
            {{ $title }}
        </x-slot>
<<<<<<< HEAD

        @if (count($widgets) == 1)
=======
        @if (count($widgets)==1)
>>>>>>> b3ee963 (Dusting)
            @livewire($widgets[0]['class'], $widgets[0]['properties'])
        @endif


<<<<<<< HEAD
        @if (count($widgets) == 3)
            <x-filament::grid lg='2'>
                <x-filament::grid.column>
                    @livewire($widgets[0]['class'], $widgets[0]['properties'])
=======
        @if (count($widgets)==3)
        <x-filament::grid lg='2'>
            <x-filament::grid.column>
                @livewire($widgets[0]['class'], $widgets[0]['properties'])
>>>>>>> b3ee963 (Dusting)

                </x-filament::grid.column>
                <x-filament::grid.column>
                    @livewire($widgets[1]['class'], $widgets[1]['properties'])<br />
                    @livewire($widgets[2]['class'], $widgets[2]['properties'])
                </x-filament::grid.column>
            </x-filament::grid>
        @endif
    </x-filament::section>
</x-filament-widgets::widget>
