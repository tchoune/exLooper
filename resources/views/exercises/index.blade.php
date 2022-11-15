    <ul>
        @foreach ($exercises as $exercise)
            <li>{{ $exercise->title }}</li>
        @endforeach
    </ul>