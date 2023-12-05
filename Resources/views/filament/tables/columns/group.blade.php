@php
    $fields=$getFields();
    $record=$getRecord();
@endphp
<div>
    <table >
    @foreach($fields as $field)
        <tr>
            {{--
            <td>{{ $field->getName() }}</td>
            --}}
            <td>{{ $field->record($record)->getState() }}</td>
        </tr>
    @endforeach
    </table>
</div>