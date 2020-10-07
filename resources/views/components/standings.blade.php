<div class="mb-5">
    <h1>Classement du championnat</h1>
    <div>
        <table class="w-100">
            <thead>
            <tr>
                <th scope="col" class="pl-3"><a href="{{ route('home_page') }}/?s=team_id">Team</a></th>
                <th scope="col"><a href="{{ route('home_page') }}/?s=games">Games</a></th>
                <th scope="col"><a href="{{ route('home_page') }}/?s=points">Points</a></th>
                <th scope="col"><a href="{{ route('home_page') }}/?s=wins">Wins</a></th>
                <th scope="col"><a href="{{ route('home_page') }}/?s=looses">Looses</a></th>
                <th scope="col"><a href="{{ route('home_page') }}/?s=draws">Draws</a></th>
                <th scope="col"><a href="{{ route('home_page') }}/?s=goals_for">Goals For</a></th>
                <th scope="col"><a href="{{ route('home_page') }}/?s=goals_against">Goals Against</a></th>
                <th scope="col"><a href="{{ route('home_page') }}/?s=goals_difference">Goals Difference</a></th>
            </tr>
            </thead>
            <tbody>
                @foreach($teamStats as $stat)
                    <tr class="shadow-sm" style="height: 40px">
                        <td class="pl-3">{{ $stat->name }}</td>
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
