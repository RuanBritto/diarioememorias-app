<script setup>
import MainLayout from '@/Layouts/MainLayout.vue'
import { Link, router } from '@inertiajs/vue3'

defineProps({
  entries: Array
})

function deletar(id) {
  if (confirm('Tem certeza que deseja deletar?')) {
    router.delete(`/deletar/${id}`)
  }
}
</script>

<template>
  <MainLayout>

    <h1 class="text-2xl font-bold mb-6">
      📚 Memórias
    </h1>

    <div v-if="entries.length === 0" class="text-gray-400">
      Nenhuma memória ainda.
    </div>

    <div class="space-y-4">

      <div v-for="entry in entries" :key="entry.id"
        class="bg-gray-800 p-4 rounded-lg border border-gray-700">

        <h2 class="text-xl font-semibold">
          {{ entry.title }}
        </h2>

        <p class="text-gray-300 mt-2">
          {{ entry.content }}
        </p>

        <!-- AÇÕES -->
        <div class="flex gap-4 mt-4">

          <!-- EDITAR -->
          <Link
            :href="`/editar/${entry.id}`"
            class="text-blue-400 hover:underline"
          >
            ✏️ Editar
          </Link>

          <!-- DELETAR -->
          <button
            @click="deletar(entry.id)"
            class="text-red-400 hover:underline"
          >
            🗑️ Deletar
          </button>

        </div>

      </div>

    </div>

  </MainLayout>
</template>