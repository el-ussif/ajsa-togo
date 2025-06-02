
@extends('layouts.admin.app')

@section('title', 'Catégories')

@section('content')
    <div class="">
        <!-- Détail de la catégorie -->
        <div class="bg-white rounded-lg shadow-xl w-full mx-auto mt-6">
            <!-- En-tête -->
            <div class="flex justify-between items-center p-6 border-b">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Détails de la catégorie</h2>
                    <p class="text-gray-600">Informations complètes sur cette catégorie</p>
                </div>
                <div class="flex space-x-2">
                    <a href="{{ route('categories.edit', $category->id) }}"
                       class="flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                        </svg>
                        Modifier
                    </a>

                    <button type="submit"
                            onclick="document.getElementById('deleteModal{{ $category->id }}').classList.remove('hidden')"
                            class="flex items-center px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Supprimer
                    </button>

                    <div id="deleteModal{{ $category->id }}" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
                        <div class="bg-white rounded-lg shadow-lg w-full max-w-md">
                            <form method="POST" action="{{ route('categories.destroy', $category) }}">
                                @csrf
                                @method('DELETE')
                                <div class="px-6 py-4 border-b">
                                    <h2 class="text-lg font-semibold">Confirmation</h2>
                                </div>
                                <div class="p-6">
                                    <p>Êtes-vous sûr de vouloir supprimer <strong>{{ $category->name }}</strong> ?</p>
                                </div>
                                <div class="flex justify-end gap-2 px-6 py-4 border-t">
                                    <button
                                        type="button"
                                        class="px-4 py-2 text-gray-700 border rounded hover:bg-gray-100"
                                        onclick="document.getElementById('deleteModal{{ $category->id }}').classList.add('hidden')"
                                    >
                                        Annuler
                                    </button>
                                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Supprimer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contenu -->
            <div class="p-6">
                <!-- Info générale -->
                <div class="mb-8 border border-gray-200 p-6 rounded-lg bg-white">
                    <div class="flex items-center mb-2">
                        <svg class="h-6 w-6 text-gray-700 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <h3 class="text-lg font-bold text-gray-800">Information générale</h3>
                    </div>

                    <div class="mb-4">
                        <p class="font-medium text-gray-700 mb-1">Nom de la catégorie :</p>
                        <div class="bg-gray-100 p-3 rounded-md">
                            <p class="text-gray-800">{{ $category->name }}</p>
                        </div>
                    </div>

                    <div>
                        <p class="font-medium text-gray-700 mb-1">Description :</p>
                        <div class="bg-gray-100 p-3 rounded-md">
                            <p class="text-gray-800">{{ $category->description ?? 'Non renseignée' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Dates -->
                <div class="border border-gray-200 p-6 rounded-lg bg-white">
                    <div class="flex items-center mb-2">
                        <svg class="h-6 w-6 text-gray-700 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <h3 class="text-lg font-bold text-gray-800">Dates</h3>
                    </div>

                    <div class="mb-4">
                        <p class="font-medium text-gray-700 mb-1">Créée le :</p>
                        <div class="bg-gray-100 p-3 rounded-md flex items-center">
                            <svg class="h-5 w-5 text-gray-500 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <p class="text-gray-800">{{ $category->created_at->format('d/m/Y à H:i:s') }}</p>
                        </div>
                    </div>

                    <div>
                        <p class="font-medium text-gray-700 mb-1">Dernière mise à jour :</p>
                        <div class="bg-gray-100 p-3 rounded-md flex items-center">
                            <svg class="h-5 w-5 text-gray-500 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <p class="text-gray-800">{{ $category->updated_at->format('d/m/Y à H:i:s') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

