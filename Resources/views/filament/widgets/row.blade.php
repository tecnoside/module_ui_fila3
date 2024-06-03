<x-filament-widgets::widget id="overlook-widget" >
    <x-filament::grid
        :default="$grid['default'] ?? 1"
        :sm="$grid['sm'] ?? null"
        :md="$grid['md'] ?? null"
        :lg="$grid['lg'] ?? null"
        :xl="$grid['xl'] ?? null"
        class="gap-6"
    >

    @foreach ($widgets as $k=>$v)
        <x-filament::grid.column>
            {{ $k }}
        </x-filament::grid.column>
    @endforeach

    </x-filament::grid>
</x-filament-widgets::widget>
