<div>
    <h1>
        Add team
    </h1>
    <div>
        <h2>
            Équipe déjà listée
        </h2>
        <ul>
            @foreach($teams as $team)
                <li>
                    {{ $team->name }} - {{ $team->slug }}
                </li>
            @endforeach
        </ul>
        @can('add_match')
            <p>
                <a href="{{ route('create_match') }}">ajouter un match</a>
            </p>
        @endcan
    </div>
</div>
