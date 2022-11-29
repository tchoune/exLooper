<h2>Les fields de mon exercise</h2>
@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
        @php
            Session::forget('success');
        @endphp
    </div>
@endif

<div>
    <table>
        <thead>
            <tr>
                <th>Label</th>
                <th>Value kind</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($exercise->fields as $field)
            <tr>
                <td>{{ $field->label }}</td>
                <td>{{ $field->value_type->name }}</td>
                
                <td><a href="{{route('fields.edit', [$exercise, $field])}}">Modifier</a> | 
                    <form method="POST" action="{{route('fields.destroy', [$exercise, $field])}}">
                        @method('DELETE')
                        @csrf    
                        <button type="submit">Delete</button>
                    </form>
                </td>
        
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<a href=" {{ route('fields.create', $exercise)}}">Créer un field</a>