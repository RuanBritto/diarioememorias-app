<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Memórias</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 dark:bg-gray-900 flex items-center justify-center min-h-screen">

    <div class="bg-white dark:bg-gray-800 p-10 rounded-2xl shadow-xl text-center max-w-md w-full">

        <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">
            📘 Diário & Memórias
        </h1>

        <p class="text-gray-500 mb-8">
            Guarde seus pensamentos, registre momentos e revisite suas memórias.
        </p>

        <div class="space-y-4">

            <a href="/login"
               class="block w-full bg-blue-500 hover:bg-blue-600 text-white py-3 rounded-xl font-semibold shadow">
                🔐 Entrar
            </a>

            <a href="/register"
               class="block w-full bg-gray-200 hover:bg-gray-300 text-gray-800 py-3 rounded-xl font-semibold shadow">
                ✍️ Criar Conta
            </a>

        </div>

    </div>

</body>
</html>