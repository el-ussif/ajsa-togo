@extends('layouts.guest')

@section('content')
    <div class="relative p-6 bg-white z-1 dark::bg-gray-900 sm:p-0">
        <div class="relative flex flex-col justify-center w-full h-screen dark::bg-gray-900 sm:p-0 lg:flex-row">
            <div class="flex flex-col flex-1 w-full lg:w-1/2">
                <div class="flex flex-col justify-center flex-1 w-full max-w-md mx-auto">
                    <h1 class="mb-2 font-semibold text-gray-800 text-xl dark::text-white/90">Connexion</h1>
                    <p class="text-sm text-gray-500 dark::text-gray-400">
                        Entrez votre adresse email et votre mot de passe pour vous connecter.
                    </p>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mt-6 space-y-4 w-full flex flex-col">
                            <!-- Email -->
                            <div class="w-full">
                                <label for="email" class="block text-sm font-medium text-gray-700 dark::text-gray-300">Adresse email</label>
                                <input id="email" name="email" type="email" required autofocus autocomplete="username"
                                       class="block w-full mt-1 px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                @error('email')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Mot de passe -->
                            <div class="w-full">
                                <label for="password" class="block text-sm font-medium text-gray-700 dark::text-gray-300">Mot de passe</label>
                                <input id="password" name="password" type="password" required autocomplete="current-password"
                                       class="block w-full mt-1 px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                @error('password')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Se souvenir de moi -->
                            <div class="flex items-center w-fit">
                                <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                <label for="remember_me" class="ml-2 block text-sm text-gray-900 dark::text-gray-300">Se souvenir de moi</label>
                            </div>

                            <!-- Bouton de connexion -->
                            <div>
                                <button type="submit"
                                        class="flex items-center justify-center w-full px-4 py-3 text-sm font-medium text-white transition rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600">
                                    Se connecter
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
