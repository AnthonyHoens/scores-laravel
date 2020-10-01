<div>
    <h1>Encodage d’un nouveau match</h1>
    <form action="/" method="POST">
        @csrf

        <label for="match-date">Date du match</label>
        <input type="text" id="match-date" name="match-date" placeholder="2020-04-10">
        @error('match-date')
            <p>
                {{ $message }}
            </p>
        @enderror


        <br>
        <label for="home-team">Équipe à domicile</label>
        <select name="home-team" id="home-team">
            @if($teams)
                @foreach ($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name . __("[$team->slug]") }}</option>
                @endforeach
            @endif
        </select>


        @can('add_team')
            <a href="{{ route('create_team') }}">Équipe non listée&nbsp;?</a>
        @endcan
        <br>


        <label for="home-team-goals">Goals de l’équipe à domicile</label>
        <input type="text" id="home-team-goals" name="home-team-goals">
        <br>
        @error('home-team-goals')
            <p>
                {{ $message }}
            </p>
        @enderror



        <label for="away-team">Équipe visiteuse</label>
        <select name="away-team" id="away-team">
            @if($teams)
                @foreach ($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name . __("[$team->slug]") }}</option>
                @endforeach
            @endif
        </select>

        @can('add_team')
            <a href="{{ route('create_team') }}">Équipe non listée&nbsp;?</a>
        @endcan
        <br>


        <label for="away-team-goals">Goals de l’équipe visiteuse</label>
        <input type="text" id="away-team-goals" name="away-team-goals">
        <br>
        @error('away-team-goals')
            <p>
                {{ $message }}
            </p>
        @enderror


        <input type="submit" value="Ajouter ce match">
    </form>
</div>
