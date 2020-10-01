@extends('layouts.app')

@section('content')
    <x-match-create :teams="$teams"></x-match-create>
@endsection
