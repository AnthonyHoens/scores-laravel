@extends('layouts.app')

@section('content')
    @auth()
        <x-user-info-card :user="$user"></x-user-info-card>
    @endauth

    <x-standings :teamStats="$teamStats" :matchOrder="$matchOrder" :matches="$matches"></x-standings>

    <x-match-played :matches="$matches" :teamStatsOrder="$teamStatsOrder" :matches="$matches"></x-match-played>

@endsection



