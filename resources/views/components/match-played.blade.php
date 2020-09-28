<div>
    <section>
        <h2>Matchs joués au {{ \Carbon\Carbon::now('Europe/Brussels')->locale('fr_BE')->isoFormat('dddd DD MMMM YYYY') }}</h2>
        @if ($matches)
            <table>
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Équipe visitée</th>
                    <th>Goals de l’équipe visitée</th>
                    <th>Goals de l’équipe visiteuse</th>
                    <th>Équipe visiteuse</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($matches as $match)
                    <tr>
                        <td>{{ $match->date }}</td>
                        <td>{{ $match->teams[0]->name }}</td>
                        <td>{{ $match->teams[0]->pivot->goals }}</td>
                        <td>{{ $match->teams[1]->pivot->goals }}</td>
                        <td>{{ $match->teams[1]->name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>Aucun match n’a été joué à ce jour</p>
        @endif
    </section>
</div>
