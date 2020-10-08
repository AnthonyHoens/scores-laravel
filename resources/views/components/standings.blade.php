<div class="mb-5">
    <h1>Classement du championnat</h1>
    <div>
        <table class="w-100">
            <thead>
            <tr>
                <th scope="col" class="pl-3">
                    <a href="{{ route('home_page') }}/?s=team_id&m={{$matchOrder}}">Team</a>
                </th>
                <th scope="col"><a href="{{ route('home_page') }}/?s=games&m={{$matchOrder}}">Games</a></th>
                <th scope="col"><a href="{{ route('home_page') }}/?s=points&m={{$matchOrder}}">Points</a></th>
                <th scope="col"><a href="{{ route('home_page') }}/?s=wins&m={{$matchOrder}}">Wins</a></th>
                <th scope="col"><a href="{{ route('home_page') }}/?s=looses&m={{$matchOrder}}">Looses</a></th>
                <th scope="col"><a href="{{ route('home_page') }}/?s=draws&m={{$matchOrder}}">Draws</a></th>
                <th scope="col"><a href="{{ route('home_page') }}/?s=goals_for&m={{$matchOrder}}">Goals For</a></th>
                <th scope="col"><a href="{{ route('home_page') }}/?s=goals_against&m={{$matchOrder}}">Goals Against</a></th>
                <th scope="col"><a href="{{ route('home_page') }}/?s=goals_difference&m={{$matchOrder}}">Goals Difference</a></th>
            </tr>
            </thead>
            <tbody>
                @foreach($teamStats as $stat)
                    <tr class="shadow-sm" style="height: 40px">
                        <td class="pl-3">
                            @if($stat->image)
                                <img src="{{ asset('images/small/'. $stat->image) }}" class="py-2">
                            @endif
                            {{ $stat->name }}
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
