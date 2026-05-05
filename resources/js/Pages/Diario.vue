<script setup>
import MainLayout from '@/Layouts/MainLayout.vue'
import { useForm } from '@inertiajs/vue3'

const form = useForm({
  title: '',
  content: ''
})

function submit() {
  form.post('/salvar')
}
</script>

<template>
  <MainLayout>

    <div class="flex justify-center">

      <div class="bg-gray-800 w-full max-w-xl p-8 rounded-2xl shadow-xl border border-gray-700">
        
        <h1 class="text-2xl font-bold text-white mb-6 text-center">
          ✍️ Novo Registro
        </h1>

        <form @submit.prevent="submit">

          <input
            v-model="form.title"
            type="text"
            placeholder="Título"
            class="w-full mb-4 p-3 bg-gray-800 text-white border border-gray-600 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500"
          />

          <textarea
            v-model="form.content"
            placeholder="Escreva seu pensamento..."
            class="w-full mb-4 p-3 bg-gray-800 text-white border border-gray-600 rounded-lg h-32 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500"
          ></textarea>

          <button
            type="submit"
            class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition"
          >
            Salvar
          </button>

        </form>

      </div>

    </div>

  </MainLayout>
</template>