<form action="{{ route('posts.destroy', $post->id) }}" method="POST">
   @csrf
    @method('DELETE')
    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
        Delete
    </button>
</form>
