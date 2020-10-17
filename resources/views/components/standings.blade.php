<div class="mb-5">
    <h1>Classement du championnat</h1>
    <div>
        <table class="w-100">
            <thead>
            <tr>
                <th scope="col" class="pl-3">
                        <a href="{{ route('home_page') }}/?s=name&m={{$matchOrder}}&page={{ $matches->currentPage() }}">Équipes</a>
                </th>
                <th scope="col">
                    <a href="{{ route('home_page') }}/?s=games&m={{$matchOrder}}&page={{ $matches->currentPage() }}">Match joués</a>
                </th>
                <th scope="col"><a href="{{ route('home_page') }}/?s=points&m={{$matchOrder}}&page={{ $matches->currentPage() }}">Points</a></th>
                <th scope="col"><a href="{{ route('home_page') }}/?s=wins&m={{$matchOrder}}&page={{ $matches->currentPage() }}">Victoires</a></th>
                <th scope="col"><a href="{{ route('home_page') }}/?s=looses&m={{$matchOrder}}&page={{ $matches->currentPage() }}">Défaites</a></th>
                <th scope="col"><a href="{{ route('home_page') }}/?s=draws&m={{$matchOrder}}&page={{ $matches->currentPage() }}">Égalités</a></th>
                <th scope="col"><a href="{{ route('home_page') }}/?s=goals_for&m={{$matchOrder}}&page={{ $matches->currentPage() }}">Goals marqués</a></th>
                <th scope="col"><a href="{{ route('home_page') }}/?s=goals_against&m={{$matchOrder}}&page={{ $matches->currentPage() }}">Goals encaissés</a></th>
                <th scope="col"><a href="{{ route('home_page') }}/?s=goals_difference&m={{$matchOrder}}&page={{ $matches->currentPage() }}">Différence de goals</a></th>
            </tr>
            </thead>
            <tbody>
                @foreach($teamStats as $stat)
                    <tr class="shadow-sm" style="height: 40px">
                        <td class="pl-3">
                            @if($stat->image)
                                <img src="{{ asset('images/small/'. $stat->image) }}" class="py-2">
                            @endif
                            @guest()
                                {{ $stat->name }}
                            @endguest
                            @auth()
                                <a href="/team/{{ $stat->slug }}">{{ $stat->name }}</a>
                            @endauth
                        </td>
                        <td>{{ $stat->games }}</td>
                        <td>{{ $stat->points }}</td>
                        <td>{{ $stat->wins }}</td>
                        <td>{{ $stat->looses }}</td>
                        <td>{{ $stat->draws }}</td>
                        <td>{{ $stat->goals_for }}</td>
                        <td>{{ $stat->goals_against }}</td>
                        <td>{{ $stat->goals_difference }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
