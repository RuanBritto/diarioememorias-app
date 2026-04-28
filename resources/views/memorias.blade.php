<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
            📖 Minhas memórias
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 py-10">

        <div class="max-w-2xl mx-auto space-y-6">

            @forelse ($entries as $entry)

                <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg">

                    <!-- título -->
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">
                        {{ $entry->title }}
                    </h3>

                    <!-- data -->
                    <p class="text-sm text-gray-500 mb-2">
                        {{ $entry->created_at->format('d/m/Y H:i') }}
                    </p>

                    <!-- conteúdo -->
                    <p class="text-gray-700 dark:text-gray-300">
                        {{ $entry->content }}
                    </p>

                    <!-- ações -->
                    <div class="mt-4 flex justify-end items-center space-x-4 text-sm">

                        <!-- editar -->
                        <a href="/editar/{{ $entry->id }}"
                           class="text-blue-500 hover:text-blue-700 font-semibold">
                           ✏️ Editar
                        </a>

                        <!-- excluir -->
                        <form action="/deletar/{{ $entry->id }}" method="POST"
                              onsubmit="return confirm('Tem certeza que deseja excluir este diário?')">

                            @csrf
                            @method('DELETE')

                            <button class="text-red-500 hover:text-red-700 font-semibold">
                                🗑️ Excluir
                            </button>
                        </form>

                    </div>

                </div>

            @empty

                <div class="text-center text-gray-500 dark:text-gray-400 mt-10">
                    <p class="text-lg">📘 Nenhuma Memória ainda</p>
                    <p class="text-sm mt-2">Clique em "Novo Diário" para começar</p>
                </div>

            @endforelse

        </div>

    </div>
</x-app-layout>