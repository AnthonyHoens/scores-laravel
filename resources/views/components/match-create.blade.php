<div>
    <h1>Encodage d’un nouveau match</h1>
    <form action="/match" method="POST" class="w-100">
        @csrf

        <label for="match-date" class="d-block mb-1">Date du match</label>
        <input type="text" id="match-date" name="match-date" placeholder="2020-04-10" class="w-100 mb-3">
        @error('match-date')
            <p class="alert-danger">
                {{ $message }}
            </p>
        @enderror


        <br>
        <label for="home-team" class="d-block mb-1">Équipe à domicile</label>
        <select name="home-team" id="home-team" class="mb-3">
            <option value="">----</option>
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


        <label for="home-team-goals" class="d-block mb-1">Goals de l’équipe à domicile</label>
        <input type="text" id="home-team-goals" name="home-team-goals" class="w-100 mb-3">
        <br>
        @error('home-team-goals')
            <p class="alert-danger">
                {{ $message }}
            </p>
        @enderror



        <label for="away-team" class="d-block mb-1">Équipe visiteuse</label>
        <select name="away-team" id="away-team" class="mb-3">
            <option value="">----</option>
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


        <label for="away-team-goals" class="d-block mb-1">Goals de l’équipe visiteuse</label>
        <input type="text" id="away-team-goals" name="away-team-goals" class="mb-3 w-100 mb-4">
        <br>
        @error('away-team-goals')
            <p class="alert-danger">
                {{ $message }}
            </p>
        @enderror


        <input type="submit" value="Ajouter ce match" class="w-25">
    </form>
</div>
