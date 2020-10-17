<div>
    @foreach($users as $user)
        <div class="w-50 d-inline-block mb-5">
            <img src="{{ asset('images/profil/'. $user->image) }}" alt="Image de {{ $user->name }}" class="w-25">
            <h1>
                <a href="{{ route('user_show', $user->slug) }}">{{ $user->name }}</a>
            </h1>
            <p>
                {{ $user->emails }}
            </p>
            @if($user->roles)
                <div>
                    <ul>
                        @foreach($user->roles as $role)
                            <li>
                                {{ $role->name }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    @endforeach
</div>
