<h1>Modifier champs d'un formulaire</h1>
@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
        @php
            Session::forget('success');
        @endphp
    </div>
@endif


<form action="{{route('fields.update', [$exercise, $field->id])}}" method="POST">
    @csrf
    @method('PUT')
    <label>Label</label><input type="text" name="label" value="{{$field->label}}">
    <label>Value Kind</label>
    <select name="value_type">
        @foreach (App\Models\FieldsTypeValue::cases() as $valueType)
            @if ($valueType == $field->value_type)
                <option value="{{ $valueType }}" selected>{{ $valueType->name }}</option>
            @else
                <option value="{{ $valueType }}">{{ $valueType->name }}</option>
            @endif
        @endforeach
    </select>
    <button>Modifier </button>
</form>