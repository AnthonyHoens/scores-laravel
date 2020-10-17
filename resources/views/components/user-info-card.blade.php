<div class="card p-4 mb-5 w-50">
    <div class="d-flex justify-content-start align-items-center mb-3">
        <img src="{{ asset('images/profil/' . $user->image) }}" class="w-25 d-inline-block rounded-circle mr-3" alt="Image de profil de {{ $user->name }}">
        <div>
            <h1 class="d-inline-block mb-1">
                <a href="{{ route('user_show', $user->slug) }}">{{ $user->name }}</a>
            </h1>
            <p class="font-italic d-inline-block">
                {{ $user->emails }}
            </p>
        </div>
    </div>
    <div class="d-flex">
        <div class="w-50 d-inline-block">
            <h2 class="">
                Rôles
            </h2>
            @if(count($user->roles) != 0)
                <ul class="mb-0">
                    @foreach($user->roles as $role)
                        <li>
                            {{ $role->name }}
                        </li>
                    @endforeach
                </ul>
            @else
                <p>
                    Vous n'avez pas de rôles
                </p>
            @endif
        </div>

        <div class=d-inline-block">
            <nav>
                <h2>
                    Navigations
                </h2>
                <ul>
                    <li>
                        <a href="{{ route('home_page') }}">Accueil</a>
                    </li>
                    <li>
                        <a href="{{ route('team_page') }}">Équipes</a>
                    </li>
                    <li>
                        <a href="{{ route('user_page') }}">Utilisateurs</a>
                    </li>
                    @canany(['add_match', 'add_team'])
                        @can('add_match')
                            <li><a href="{{ route('create_match') }}">Ajouter un match</a></li>
                        @endcan
                        @can('add_team')
                            <li><a href="{{ route('create_team') }}">Ajouter une équipe</a></li>
                        @endcan
                    @endcanany
                </ul>
            </nav>
        </div>
    </div>

</div>
