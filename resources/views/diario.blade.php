@php use Illuminate\Support\Str; @endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
            📘 Novo Diário
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 py-10">

        <div class="max-w-2xl mx-auto space-y-8">

            <!-- FORM -->
            <div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg">

                <form method="POST" action="/salvar" class="space-y-6">
                    @csrf

                    <!-- Título -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-600 dark:text-gray-300 mb-1">
                            Título
                        </label>
                        <input type="text" name="title"
                            class="w-full rounded-lg border border-gray-300
                                   dark:border-gray-600
                                   bg-gray-50 dark:bg-gray-700
                                   text-gray-900 dark:text-white
                                   px-4 py-2">
                    </div>

                    <!-- Conteúdo -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-600 dark:text-gray-300 mb-1">
                            Conteúdo
                        </label>
                        <textarea name="content" rows="6"
                            class="w-full rounded-lg border border-gray-300
                                   dark:border-gray-600
                                   bg-gray-50 dark:bg-gray-700
                                   text-gray-900 dark:text-white
                                   px-4 py-2"></textarea>
                    </div>

                    <!-- Botões -->
                    <div class="flex justify-between items-center">
                        <a href="/welcome"
                           class="text-sm text-gray-500 hover:text-blue-500">
                           ← Voltar
                        </a>

                        <button
                            class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-2 rounded-lg">
                            Salvar
                        </button>
                    </div>

                </form>

            </div>

            <!-- ÚLTIMOS REGISTROS -->
            <div>
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

    </div>
</x-app-layout>