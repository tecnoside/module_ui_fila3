@php
    $fields=$getFields();
    $record=$getRecord();
@endphp
<div
    {{
        $attributes
            ->merge($getExtraAttributes(), escape: false)
            ->class([
                'fi-ta-icon flex flex-wrap gap-1.5',
                'px-3 py-4' => ! $isInline(),
                //'flex-col' => $isListWithLineBreaks(),
                'flex-col' => true,
            ])
    }}
>
    @foreach($fields as $field)
        
        {!! str_replace(', ',',<br/>',$field->record($record)->getState()) !!}
        <br/>
        {{--
        {{ $field->record($record) }}
        --}}
    @endforeach


</div>