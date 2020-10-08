<div>
    <h1>
        Modifier l'équipe <em>{{ $team->name }}</em>
    </h1>
    <form action="/team/{{ $team->slug }}" method="POST" enctype="multipart/form-data" class="w-100">
        @csrf
        @method('put')

        <label for="name">Nom</label>
        <input type="text" name="name" id="name" value="{{ $team->name }}" class="w-100 mb-3">

        <label for="slug">Slug</label>
        <input type="text" name="slug" id="slug" value="{{ $team->slug }}" class="w-100 mb-3">

        <label for="img">Modifier l'image</label>
        <img src="{{ asset('images/small/'. $team->file_name) }}" alt="Logo de {{ $team->name }}">
        <input type="file" id="img" name="img" class="w-100 mb-3">

        <input type="submit" value="Modifier l'équipe" class="btn-primary border-0 p-2">
    </form>
</div>
