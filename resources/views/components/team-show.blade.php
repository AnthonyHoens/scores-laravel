<div>
    <div>
        <a href="{{ route('team_page') }}">Retourner à la page des équipes</a>
    </div>
    <img src="{{ asset('images/big/'. $team->file_name) }}" alt="Image de {{ $team->name }}">
    <h1>
        {{ $team->name }} <em>{{ $team->slug }}</em>
    </h1>

    <div>
        <a href="/team/{{ $team->slug }}/edit" class="btn-primary p-2">Modifier l'équipe</a>
    </div>
</div>
