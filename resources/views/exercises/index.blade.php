<h1>Exercises</h1>

@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
        @php
            Session::forget('success');
        @endphp
    </div>
@endif

<form method="POST" action="{{route('exercises.store')}}">
    @method('POST')
    @csrf
    <label>Title</label><input type="text" name="title" />
    <input type="submit" value="create">
</form>





<ul>
    @foreach ($exercises as $exercise)
    <li>{{ $exercise->title }} ||  
        <form method="POST" action="{{route('exercises.destroy', [$exercise->id])}}">
            @method('DELETE')
            @csrf    
        <button type="submit">Delete</button></form></li>
    @endforeach
</ul>




