<div class="position-relative">
    <div>
        <a href="{{ route('team_page') }}">Retourner à la page des équipes</a>
    </div>
    <img src="{{ asset('images/big/'. $team->file_name) }}" alt="Image de {{ $team->name }}">
    <h1>
        {{ $team->name }} <em>{{ $team->slug }}</em>
    </h1>

    @can('edit_team')
        <div class="position-absolute r-0 t-0">
            <a href="/team/{{ $team->slug }}/edit" class="btn-primary p-2">Modifier l'équipe</a>
        </div>
    @endcan
    <div>
        @if ($teamMatches)
            <h2>
                Match de l'équipe {{ $team->name }}
            </h2>
            <table class="w-100 mb-4">
                <thead>
                <tr>
                    <th class="pl-3">Date</th>
                    <th>Équipe visitée</th>
                    <th>Goals de l’équipe visitée</th>
                    <th>Goals de l’équipe visiteuse</th>
                    <th>Équipe visiteuse</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($teamMatches->matches as $match)
                    <tr class="shadow-sm" style="height: 40px">
                        <td class="p-3">{{ $match->date_format }}</td>
                        <td>{{ $match->home_team_name }}</td>
                        <td>{{ $match->home_team_goals }}</td>
                        <td>{{ $match->away_team_goals }}</td>
                        <td>{{ $match->away_team_name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>Aucun match n’a été joué à ce jour</p>
        @endif
    </div>
</div>
