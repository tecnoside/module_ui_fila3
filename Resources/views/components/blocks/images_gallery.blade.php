@php
    $data = $block['data']['gallery'][0];
@endphp

<div>
  @include('ui::components.blocks.'.$tpl.'.'.$data['version'])
</div>
