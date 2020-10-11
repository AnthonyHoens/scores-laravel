<div class="mb-4">
    <section id="matchPlayed">
        <h2>Matchs joués au {{ \Carbon\Carbon::now('Europe/Brussels')->locale('fr_BE')->isoFormat('dddd DD MMMM YYYY') }}</h2>
        @if ($matches)
            <table class="w-100 mb-4">
                <thead>
                <tr>
                    <th class="pl-3"><a href="{{ route('home_page') }}/?m=date&s={{$teamStatsOrder}}&page={{ $matches->currentPage() }}">Date</a></th>
                    <th><a href="{{ route('home_page') }}/?m=home_team_name&s={{$teamStatsOrder}}&page={{ $matches->currentPage() }}">Équipe visitée</a></th>
                    <th><a href="{{ route('home_page') }}/?m=home_team_goals&s={{$teamStatsOrder}}&page={{ $matches->currentPage() }}">Goals de l’équipe visitée</a></th>
                    <th><a href="{{ route('home_page') }}/?m=away_team_goals&s={{$teamStatsOrder}}&page={{ $matches->currentPage() }}">Goals de l’équipe visiteuse</a></th>
                    <th><a href="{{ route('home_page') }}/?m=away_team_name&s={{$teamStatsOrder}}&page={{ $matches->currentPage() }}">Équipe visiteuse</a></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($matches as $match)
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

        <div class="d-flex justify-content-center paginate">
            {{ $matches->render() }}
        </div>

    </section>
</div>
