@extends('layouts.app')

@section('content')
    <x-user-info-card :user="$user"></x-user-info-card>

    <div class="position-absolute t-0 r-0">
        <a href="{{ route('user_edit', $user->slug) }}" class="btn-primary p-2">Modifier l'utilisateur</a>
    </div>

@endsection
