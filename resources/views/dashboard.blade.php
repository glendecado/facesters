<x-app-layout>
    @if(session('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed bottom-0 right-0 mb-4 mr-4 p-4 bg-green-500 text-white rounded-md shadow-md">
        {{ session('success') }}
    </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-cent">
                    @include('posts.create')
                </div>
            </div>
        </div>
    </div>
    @include('posts.index')
</x-app-layout>