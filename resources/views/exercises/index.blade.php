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
    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"/>
        <input type="submit" value="create">

    </div>
    <div class="mb-3">
        @error('title')
        <span class="text-danger">{{ $message }}</span>
        @endif
    </div>

</form>

<ul>
    @foreach ($exercises as $exercise)
        <li>
            <a href="{{route('fields.index', $exercise->id)}}">{{ $exercise->title }} ||  
                <form method="POST" action="{{route('exercises.destroy', [$exercise])}}">
                    @method('DELETE')
                    @csrf    
                <button type="submit">Delete</button>
                </form>
            </a>
        </li>
    @endforeach
</ul>