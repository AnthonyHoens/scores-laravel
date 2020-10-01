@extends('layouts.app')

@section('content')
    <x-standings></x-standings>

    <x-match-played :matches="$matches"></x-match-played>

    @canany(['add_match', 'add_team'])
        <nav>
            <h2>
                Navigation d'administration
            </h2>
            <ul>
                @can('add_match')
                    <li><a href="{{ route('create_match') }}">Ajouter un match</a></li>
                @endcan
                @can('add_team')
                    <li><a href="{{ route('create_team') }}">Ajouter une équipe</a></li>
                @endcan
            </ul>
        </nav>
    @endcanany
@endsection



