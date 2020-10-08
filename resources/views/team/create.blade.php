@extends('layouts.app')

@section('content')
    <h1 class="d-block w-100 mb-5">
        Add team
    </h1>
    <div class="d-flex flex-wrap">
        <div class="w-25 d-inline-block">
            <h2>
                Équipe déjà listée
            </h2>
            <ul class="list-unstyled">
                @foreach($teams as $team)
                    <li>
                        @if($team->file_name)
                            <img src="{{ asset('images/small/'. $team->file_name) }}">
                        @endif
                            <a href="/team/{{ $team->slug }}">{{ $team->name }} - {{ $team->slug }}</a>
                    </li>
                @endforeach
            </ul>
            @can('add_match')
                <p>
                    <a href="{{ route('create_match') }}">ajouter un match</a>
                </p>
            @endcan
        </div>

        <x-team-create :teams="$teams"></x-team-create>
    </div>
@endsection
