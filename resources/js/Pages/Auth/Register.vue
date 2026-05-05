<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import { useForm, Link } from '@inertiajs/vue3'

const form = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: ''
})

function submit() {
  form.post('/register')
}
</script>

<template>
  <GuestLayout>

    <div class="bg-gray-800 p-8 rounded-2xl shadow border border-gray-700">

      <h1 class="text-2xl font-bold text-center mb-6">
        📝 Criar Conta
      </h1>

      <form @submit.prevent="submit">

        <input v-model="form.name" type="text" placeholder="Nome"
          class="w-full mb-4 p-3 bg-gray-900 border border-gray-600 rounded-lg" />

        <input v-model="form.email" type="email" placeholder="Email"
          class="w-full mb-4 p-3 bg-gray-900 border border-gray-600 rounded-lg" />

        <input v-model="form.password" type="password" placeholder="Senha"
          class="w-full mb-4 p-3 bg-gray-900 border border-gray-600 rounded-lg" />

        <input v-model="form.password_confirmation" type="password" placeholder="Confirmar senha"
          class="w-full mb-4 p-3 bg-gray-900 border border-gray-600 rounded-lg" />

        <button type="submit"
          class="w-full bg-blue-600 py-3 rounded-lg hover:bg-blue-700">
          Criar Conta
        </button>

      </form>

      <p class="text-gray-400 text-sm mt-6 text-center">
        Já tem conta?
        <Link href="/login" class="text-blue-400 hover:underline">
          Entrar
        </Link>
      </p>

    </div>

  </GuestLayout>
</template>