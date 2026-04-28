<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-gray-800 dark:text-white">
            ✏️ Editar Diário
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 py-10">
        <div class="max-w-2xl mx-auto">

            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">

                <form method="POST" action="/atualizar/{{ $entry->id }}">
                    @csrf

                    <input type="text" name="title"
                        value="{{ $entry->title }}"
                        class="w-full mb-4 p-2 border rounded
                               bg-white dark:bg-gray-700
                               text-black dark:text-white">

                    <textarea name="content" rows="5"
                        class="w-full mb-4 p-2 border rounded
                               bg-white dark:bg-gray-700
                               text-black dark:text-white">{{ $entry->content }}</textarea>

                    <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                        Atualizar
                    </button>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>