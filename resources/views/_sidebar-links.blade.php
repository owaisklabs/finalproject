<ul>
    <li>
        <a 
            class="font-bold text-lg mb-4 block" 
                href="/tweets">
                Home
        </a>
    </li>
    <li>
        <a 
            class="font-bold text-lg mb-4 block" 
                href="/explore">
                Explore
        </a>
    </li>
    <li>
        <a 
            class="font-bold text-lg mb-4 block" 
                href="{{ route('profile', auth()->user() ) }}">
                Profile
        </a>
    </li>
    <li>
        <form method="POST" action="/logout">
            @csrf

            <button class="font-bold text-lg">Logout</button>
        </form>
    </li>
</ul>
<br/>
<a href="/tweets">
    <button type="submit" 
        class="bg-blue-500 rounded-full shadow py-3 px-3 text-white text-sm">Tweet-a-roo!
    </button>
</a>