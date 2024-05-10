<div x-data>
    <button type="button" @click="$dispatch('open-modal',  'post-create')"> Create Post </button>

    <x-modal name="post-create">
        
        <div class="m-5">
            <p class="text-center">Create post</p>
            <form action="{{route('posts.store')}}" method="post">
                @method('post')
                @csrf
                <div>
                    <x-input-label for="title" :value="__('title:')" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>
                <div class="mt-3">
                    <textarea name="content" id="content" class="h-52 w-full resize-none border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"></textarea>
                    <x-input-error :messages="$errors->get('content')" class="mt-2" />
                </div>
                <div class="text-end">
                    <button type="submit" class="border w-20 rounded-md p-2 cursor-pointer dark:border-gray-700 dark:text-gray-300 hover:bg-slate-500">Post</button>
                </div>
            </form>

        </div>
    </x-modal>
</div>