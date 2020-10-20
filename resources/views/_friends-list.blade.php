<h3 class="font-bold text-xl mb-4">Following</h3>

<ul>
    @forelse(auth()->user()->follows as $user)
    <li class="mb-4">
        <div>

            <a href="{{ route('profile', $user) }}" class="flex items-center text-sm font-bold">
                <img src="{{ $user->avatar }}"
                    alt=""
                    class="rounded-full mr-2"
                    width="50"
                    height="50"
                >

                {{ $user->name}}
            </a>
        </div>
    </li>
    @empty
        <li>
            No firends Yet !
        </li>
    @endforelse
</ul>
