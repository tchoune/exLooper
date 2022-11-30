<div>
    <h2> Créer un nouveau field</h2>
    <form method="POST" action="{{ route('fields.store', $exercise) }}">
        @csrf
        @method('POST')
        <label>Label</label><br><input type="text" name="label" /><br>
        <label>Value King</label>
        <select name="value_type">
            @foreach($value_kind_cases as $valueType)
                <option value="{{$valueType->name}}">{{$valueType->name}}</option>
            @endforeach
        </select>
        <br>
        <button>créer un field</button>
    </form>
</div>
