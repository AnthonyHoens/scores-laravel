<div>
    <ul>
        @foreach($teams as $team)
            <li>
                <img src="{{ asset('images/small/'. $team->file_name) }}" alt="Logo de {{ $team->name }}">
                <a href="/team/{{$team->slug}}">{{ $team->name }} - {{ $team->slug }}</a>
            </li>
        @endforeach
    </ul>
</div>
