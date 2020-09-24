<div>
    <a href="/">Premier League 2020</a>
</div>
<h1>Encodage d’un nouveau match</h1>
<form action="/" method="post">
    <label for="match-date">Date du match</label>
    <input type="text" id="match-date" name="match-date" placeholder="2020-04-10">
    <br>
    <label for="home-team">Équipe à domicile</label>
    <select name="home-team" id="home-team">
        @if(isset($teams))
            @foreach ($teams as $team)
            <option value="{{ $team->id }}">{{ $team->name [$team->slug] }}</option>
            @endforeach
        @endif
    </select>
    <label for="home-team-unlisted">Équipe non listée&nbsp;?</label>
    <input type="text" name="home-team-unlisted" id="home-team-unlisted">
    <br>
    <label for="home-team-goals">Goals de l’équipe à domicile</label>
    <input type="text" id="home-team-goals" name="home-team-goals">
    <br>
    <label for="away-team">Équipe visiteuse</label>
    <select name="away-team" id="away-team">
        @if(isset($teams))
            @foreach ($teams as $team)
            <option value="{{ $team->id }}">{{ $team->name [$team->slug] }}</option>
            @endforeach
        @endif
    </select>
    <label for="away-team-unlisted">Équipe non listée&nbsp;?</label>
    <input type="text" name="away-team-unlisted" id="away-team-unlisted">
    <br>
    <label for="away-team-goals">Goals de l’équipe visiteuse</label>
    <input type="text" id="away-team-goals" name="away-team-goals">
    <br>
    <input type="hidden" name="action" value="store">
    <input type="hidden" name="resource" value="match">
    <input type="submit" value="Ajouter ce match">
</form>
