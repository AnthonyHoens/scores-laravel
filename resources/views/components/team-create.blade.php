<form action="/team" method="POST" class="w-75 d-inline-block">
    @csrf

    <label for="name" class="d-block mb-1">Nom de l'équipe</label>
    <input type="text" id="name" name="name" class="mb-3 w-100" value="{{ old('name') }}">
    @error('name')
        <p>
            {{ $message }}
        </p>
    @enderror
    <br>

    <label for="slug" class="d-block mb-1">Slug de l'équipe ( en 3 Lettres )</label>
    <input type="text" id="slug" name="slug" class="mb-3 w-100" value="{{ old('slug') }}">
    @error('slug')
    <p>
        {{ $message }}
    </p>
    @enderror
    <br>

    <label for="img" class="d-inline-block mb-3">Image de l'équipe</label>
    <input type="file" src="img" name="img" class="d-inline-block mb-3">
    @error('img')
    <p>
        {{ $message }}
    </p>
    @enderror
    <br>

    <input type="submit" value="Ajouter l'équipe" class="w-25">
</form>

