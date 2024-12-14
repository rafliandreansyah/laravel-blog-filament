<article class="flex flex-col shadow my-4">
    <!-- Article Image -->
    <a href="{{ route('post', $post) }}" class="hover:opacity-75">
        <img src="{{ $post->thumbnail }}" class="w-full">
    </a>
    <div class="bg-white flex flex-col justify-start p-6">
        <div class="flex justify-start gap-4">
            @foreach ($post->categories as $category)
                <a href="{{ route('post', $post) }}"
                    class="text-blue-700 text-sm font-bold uppercase pb-4">{{ $category->title }}</a>
            @endforeach
        </div>
        <a href="{{ route('post', $post) }}" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $post->title }}</a>
        <p href="{{ route('post', $post) }}" class="text-sm pb-3">
            By <a href="{{ route('post', $post) }}"
                class="font-semibold hover:text-gray-800">{{ $post->user->name }}</a>, Published on
            {{ $post->published() }}
        </p>
        <a href="{{ route('post', $post) }}" class="pb-6">{{ $post->shortBody() }}</a>
        <a href="{{ route('post', $post) }}" class="uppercase text-gray-800 hover:text-black">Continue Reading <i
                class="fas fa-arrow-right"></i></a>
    </div>
</article>
