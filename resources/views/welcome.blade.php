<x-app-layout>
    <div class="max-w-2xl mx-auto mt-10 space-y-6">

        <!-- ações -->
        <div class="space-y-3">
            <a href="/diario"
               class="block bg-blue-500 text-white p-4 rounded text-center">
               ✍️ Novo Diário
            </a>

            <a href="/memorias"
               class="block bg-green-500 text-white p-4 rounded text-center">
               📖 Ver todos
            </a>
        </div>

        <!-- últimos diários -->
        <div class="mt-8">
            <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-4">
                📘 Últimos registros
            </h3>

            @forelse ($entries as $entry)
                <div class="bg-white dark:bg-gray-800 p-4 rounded shadow mb-3">

                    <h4 class="font-semibold text-gray-900 dark:text-white">
                        {{ $entry->title }}
                    </h4>

                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        {{ Str::limit($entry->content, 80) }}
                    </p>

                </div>
            @empty
                <p class="text-gray-500">Nenhum diário ainda</p>
            @endforelse
        </div>

    </div>
</x-app-layout>