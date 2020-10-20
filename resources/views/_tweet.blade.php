<div class="flex p-4 {{ $loop->last ? '' : 'border-b border-b-gray-400' }}">
    <div class="mr-4 flex-shrink-0">
        <!-- We can only use this when we have getRouteKeyName() method in the User.php -->
        <!--<a href=" route('profile',$tweet->user) ">-->
        <a href="{{ $tweet->user->path() }}">
            <img 
                src="{{ $tweet->user->avatar }}" 
                alt=""
                class="rounded-full mr-2"
                width="50"
                height="50"
            >
        </a>
    </div>
    <div>
        <h5 class="font-bold mb-4">
                <!-- We can only use this when we have getRouteKeyName() method in the User.php -->
                <!--<a href=" route('profile',$tweet->user) ">-->
                <a href="{{ $tweet->user->path() }}">
                {{ $tweet->user->name }}
            </a>
        </h5>

        <p class="text-sm mb-3">
            {{ $tweet->body }}
        </p>
        
        @component('components.like-buttons', ['tweet' => $tweet])
                
        @endcomponent

    </div>
</div>