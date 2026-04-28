<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
   
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Left side -->
            <div class="flex">

                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="/welcome" class="text-lg font-bold text-gray-800 dark:text-white">
                        📘 Seu diário e Memórias
                    </a>
                </div>

                <!-- Links Desktop -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">

                    <x-nav-link href="/welcome" :active="request()->is('welcome')">
                        🏠 Welcome
                    </x-nav-link>

                    <x-nav-link href="/diario" :active="request()->is('diario')">
                        ✍️ Diário
                    </x-nav-link>

                    <x-nav-link href="/memorias" :active="request()->is('memorias')">
                        📖 Memórias
                    </x-nav-link>

                </div>
            </div>

            <!-- Right side -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 focus:outline-none">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1 text-xs">
                                ▼
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">

                        <x-dropdown-link href="/profile">
                            Perfil
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link href="{{ route('logout') }}"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                Sair
                            </x-dropdown-link>
                        </form>

                    </x-slot>
                </x-dropdown>

            </div>

            <!-- Mobile menu button -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="p-2 text-gray-600 dark:text-white text-2xl">
                    ☰
                </button>
            </div>
        </div>
    </div>

    <!-- 🔥 MOBILE MELHORADO -->
    <div x-show="open"
         class="sm:hidden bg-white dark:bg-gray-800 shadow-lg rounded-b-2xl">

        <div class="pt-4 pb-4 space-y-3 px-4">

            <a href="/welcome"
               class="block w-full text-center bg-gray-100 dark:bg-gray-700
                      text-gray-800 dark:text-white
                      py-3 rounded-xl font-semibold shadow">
                🏠 Menu
            </a>

            <a href="/diario"
               class="block w-full text-center bg-blue-500
                      text-white py-3 rounded-xl font-semibold shadow">
                ✍️ Diário
            </a>

            <a href="/memorias"
               class="block w-full text-center bg-purple-500
                      text-white py-3 rounded-xl font-semibold shadow">
                📖 Memórias
            </a>

        </div>

        <!-- User Mobile -->
        <div class="border-t border-gray-200 dark:border-gray-600 px-4 py-4 text-center">

            <div class="font-semibold text-gray-800 dark:text-white">
                {{ Auth::user()->name }}
            </div>

            <div class="text-sm text-gray-500">
                {{ Auth::user()->email }}
            </div>

            <a href="/profile"
               class="block mt-3 text-blue-500 font-semibold">
                Perfil
            </a>

            <form method="POST" action="{{ route('logout') }}" class="mt-2">
                @csrf
                <button class="text-red-500 font-semibold">
                    Sair
                </button>
            </form>

        </div>
    </div>

</nav>