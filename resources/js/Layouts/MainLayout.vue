<script setup>
import { Link, router } from '@inertiajs/vue3'

function logout() {
  router.post('/logout')
}
</script>

<template>
  <div class="min-h-screen bg-gray-900 text-white">

    <!-- NAVBAR -->
    <nav class="bg-gray-800 px-6 py-4 flex justify-between items-center shadow">

      <!-- ESQUERDA -->
      <h1 class="font-bold text-lg">
        📘 Diário
      </h1>

      <!-- DIREITA -->
      <div class="flex items-center gap-6">

        <Link href="/memorias" class="hover:text-blue-400 flex items-center gap-1">
          📚 <span>Memórias</span>
        </Link>

        <Link href="/diario" class="bg-blue-600 px-3 py-1 rounded-lg hover:bg-blue-700 flex items-center gap-1">
          ➕ <span>Novo</span>
        </Link>

        <button @click="logout" class="text-red-400 hover:text-red-300">
          Sair
        </button>

      </div>

    </nav>

    <!-- CONTEÚDO -->
    <main class="p-6">
      <slot />
    </main>

  </div>
</template>