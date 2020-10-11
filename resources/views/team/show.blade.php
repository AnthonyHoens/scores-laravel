@extends('layouts.app')

@section('content')
    <x-team-show :team="$team" :teamMatches="$teamMatches"></x-team-show>
@endsection
