@foreach($posts as $post)
<div class="py-5">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100 text-cent">
                <p class="text-gray-600 dark:text-gray-400">By: {{ $post->user->name }}</p>
                <h2 class="text-xl font-semibold mb-2 dark:text-white">{{ $post->title }}</h2>
                <p class="text-gray-700 dark:text-gray-300">{{ $post->content }}</p>
                {{--for users post--}}
                @if(Auth::id() === $post->user_id)
                <div class="text-end">
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                            Delete
                        </button>
                    </form>
                </div>

                @endif
            </div>
        </div>
    </div>
</div>

@endforeach