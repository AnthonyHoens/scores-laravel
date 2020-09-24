<div>
    @if($standings ?? ''))
    <h1>Classement du championnat</h1>
    <div>
        <table>
            <thead>
            <tr>
                <td></td>
                <th scope="col">Logo</th>
                <th scope="col">Team</th>
                <th scope="col">Games</th>
                <th scope="col">Points</th>
                <th scope="col">Wins</th>
                <th scope="col">Losses</th>
                <th scope="col">Draws</th>
                <th scope="col">GF</th>
                <th scope="col">GA</th>
                <th scope="col">GD</th>
            </tr>
            </thead>
            <tbody>
            {{ $i = 1 }}
            @foreach($standings ?? '' as $team => $teamStats)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td><img src="<?= THUMBS.$teamStats['logo'] ?>" alt=""></td>
                    <th scope="row"><?= $team ?></th>
                    <td><?= $teamStats['games'] ?></td>
                    <td><?= $teamStats['points'] ?></td>
                    <td><?= $teamStats['wins'] ?></td>
                    <td><?= $teamStats['losses'] ?></td>
                    <td><?= $teamStats['draws'] ?></td>
                    <td><?= $teamStats['GF'] ?></td>
                    <td><?= $teamStats['GA'] ?></td>
                    <td><?= $teamStats['GD'] ?></td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    @endif

</div>
