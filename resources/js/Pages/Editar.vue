<script setup>
import MainLayout from '@/Layouts/MainLayout.vue'
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
  entry: Object
})

const form = useForm({
  title: props.entry.title,
  content: props.entry.content
})

function submit() {
  form.post(`/atualizar/${props.entry.id}`)
}
</script>

<template>
  <MainLayout>

    <div class="flex justify-center">

      <div class="bg-gray-800 w-full max-w-xl p-8 rounded-2xl shadow-xl border border-gray-700">
        
        <h1 class="text-2xl font-bold text-white mb-6 text-center">
          ✏️ Editar Registro
        </h1>

        <form @submit.prevent="submit">

          <!-- Título -->
          <input
            v-model="form.title"
            type="text"
            class="w-full mb-4 p-3 bg-gray-800 text-white border border-gray-600 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500"
          />

          <!-- Conteúdo -->
          <textarea
            v-model="form.content"
            class="w-full mb-4 p-3 bg-gray-800 text-white border border-gray-600 rounded-lg h-32 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500"
          ></textarea>

          <!-- Botão -->
          <button
            type="submit"
            class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition"
          >
            Atualizar
          </button>

        </form>

      </div>

    </div>

  </MainLayout>
</template>