@extends('layouts.app')

@section('content')
    <div>
        <a href="/">Premier League 2020</a>
    </div>
    <h1>Création d’un équipe</h1>
    <form action="/" method="post" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="32000000">
        <div>
            <label for="name">Entrez le nom de l’équipe</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
        </div>
        @error('name')
        <div>
            <p>{{ $message }}</p>
        </div>
        @enderror
        <div>
            <label for="slug">Entrez un slug (3 lettres, ni plus, ni moins)</label>
            <input type="text" id="slug" name="slug" value="<?= isset($_SESSION['old']['name'])?$_SESSION['old']['slug']:'' ?>">
        </div>
        @error('slug')
        <div>
            <p>{{ $message }}</p>
        </div>
        @enderror
        <div>
            <label for="logo">Fournissez un logo (un png d’au moins 400px et au plus 1600px de large et de haut)</label>
            <input type="file" id="logo" name="logo" value="">
        </div>
        @error('logo')
        <div>
            <p>{{ $message }}</p>
        </div>
        @enderror
        <input type="hidden" name="action" value="store">
        <input type="hidden" name="resource" value="team">
        <input type="submit" value="Enregistrer cette équipe">
    </form>
@endsection
