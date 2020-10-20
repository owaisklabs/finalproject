<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form method="POST" action="/tweets">
        @csrf

        <textarea 
            name="body"
            class="w-full px-2 py-2"
            placeholder="What's up docs?"
        ></textarea>

        <hr class="my-4">

        <footer class="flex justify-between">
        
            <img src="{{ auth()->user()->avatar }}" 
                alt="Your avatar"
                class="rounded-full mr-2"
                width="50"
                height="50"
            >

            <button type="submit" 
                class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-sm"
            >
                Tweet-a-roo!
            </button>

        </footer>                 
    </form>

    @error('body')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror
</div>