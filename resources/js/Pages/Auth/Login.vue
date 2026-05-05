<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import { useForm, Link } from '@inertiajs/vue3'

const form = useForm({
  email: '',
  password: ''
})

function submit() {
  form.post('/login')
}
</script>

<template>
  <GuestLayout>

    <div class="bg-gray-800 p-8 rounded-2xl shadow border border-gray-700">

      <h1 class="text-2xl font-bold text-center mb-6">
        🔐 Login
      </h1>

      <form @submit.prevent="submit">

        <!-- EMAIL -->
        <input
          v-model="form.email"
          type="email"
          name="email"
          autocomplete="email"
          placeholder="Email"
          class="w-full mb-4 p-3 bg-gray-900 border border-gray-600 rounded-lg"
        />

        <!-- ERRO EMAIL -->
        <p v-if="form.errors.email" class="text-red-500 text-sm mb-2">
          {{ form.errors.email }}
        </p>

        <!-- SENHA -->
        <input
          v-model="form.password"
          type="password"
          name="password"
          autocomplete="current-password"
          placeholder="Senha"
          class="w-full mb-4 p-3 bg-gray-900 border border-gray-600 rounded-lg"
        />

        <!-- ERRO SENHA -->
        <p v-if="form.errors.password" class="text-red-500 text-sm mb-4">
          {{ form.errors.password }}
        </p>

        <!-- BOTÃO -->
        <button
          type="submit"
          class="w-full bg-blue-600 py-3 rounded-lg hover:bg-blue-700"
        >
          Entrar
        </button>

      </form>

      <!-- LINK REGISTER -->
      <p class="text-gray-400 text-sm mt-6 text-center">
        Não tem conta?
        <Link href="/register" class="text-blue-400 hover:underline">
          Criar conta
        </Link>
      </p>

    </div>

  </GuestLayout>
</template>