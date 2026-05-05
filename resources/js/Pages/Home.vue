<template>
  <div class="min-h-screen bg-gray-900 flex items-center justify-center">
    
    <div class="bg-gray-800 p-10 rounded-2xl shadow-xl max-w-md w-full text-center border border-gray-700">
      
      <h1 class="text-4xl font-extrabold text-white mb-3">
        📘 Diário & Memórias
      </h1>

      <p class="text-gray-400 mb-8">
        Guarde seus pensamentos, registre momentos e acompanhe sua jornada.
      </p>

      <div class="flex flex-col gap-3">
        <Link
          href="/login"
          class="w-full px-5 py-3 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition"
        >
          Entrar
        </Link>

        <Link
          href="/register"
          class="w-full px-5 py-3 bg-gray-700 text-white rounded-xl font-semibold hover:bg-gray-600 transition"
        >
          Criar Conta
        </Link>
      </div>

      <p class="text-xs text-gray-500 mt-6">
      
      </p>

    </div>

  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
</script>