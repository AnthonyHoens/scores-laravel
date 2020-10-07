<div class="mb-4">
    <section>
        <h2>Matchs joués au {{ \Carbon\Carbon::now('Europe/Brussels')->locale('fr_BE')->isoFormat('dddd DD MMMM YYYY') }}</h2>
        @if ($matches)
            <table class="w-100">
                <thead>
                <tr>
                    <th class="pl-3"><a href="{{ route('home_page') }}/?m=date">Date</a></th>
                    <th><a href="{{ route('home_page') }}/?m=team_id">Équipe visitée</a></th>
                    <th><a href="{{ route('home_page') }}/?m=goals">Goals de l’équipe visitée</a></th>
                    <th><a href="{{ route('home_page') }}/?m=goals">Goals de l’équipe visiteuse</a></th>
                    <th><a href="{{ route('home_page') }}/?m=team_id">Équipe visiteuse</a></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($matches as $match)
                    <tr class="shadow-sm" style="height: 40px">
                        <td class="p-3">{{ $match->date }}</td>
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
    </section>
</div>
