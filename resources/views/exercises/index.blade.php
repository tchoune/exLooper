<h1>Exercises</h1>
<ul>
    @foreach ($exercises as $exercise)
    <li>{{ $exercise->title }}</li>
    @endforeach
</ul>
