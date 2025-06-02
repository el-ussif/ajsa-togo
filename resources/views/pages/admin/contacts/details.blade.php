@extends('layouts.admin.app')

@section('title', 'Détails du message')

@section('content')
    <div class="">
        <div class="bg-white rounded-lg shadow-xl w-full mx-auto mt-6">

            <!-- En-tête -->
            <div class="flex justify-between items-center p-6 border-b">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Détails du message</h2>
                    <p class="text-gray-600">Informations complètes sur ce message</p>
                </div>
                <div class="flex space-x-2">
                    <a href=""
                       class="flex items-center px-4 py-2 hidden bg-white border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                        </svg>
                        Modifier
                    </a>

                    <button type="button"
                            onclick="document.getElementById('deleteModal{{ $contact->id }}').classList.remove('hidden')"
                            class="flex items-center px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Supprimer
                    </button>

                    <div id="deleteModal{{ $contact->id }}" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
                        <div class="bg-white rounded-lg shadow-lg w-full max-w-md">
                            <form method="POST" action="{{ route('contacts.destroy', $contact) }}">
                                @csrf
                                @method('DELETE')
                                <div class="px-6 py-4 border-b">
                                    <h2 class="text-lg font-semibold">Confirmation</h2>
                                </div>
                                <div class="p-6">
                                    <p>Êtes-vous sûr de vouloir supprimer ce message de <strong>{{ $contact->username }}</strong> ?</p>
                                </div>
                                <div class="flex justify-end gap-2 px-6 py-4 border-t">
                                    <button type="button"
                                            class="px-4 py-2 text-gray-700 border rounded hover:bg-gray-100"
                                            onclick="document.getElementById('deleteModal{{ $contact->id }}').classList.add('hidden')">
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
                <div class="mb-8 border border-gray-200 p-6 rounded-lg bg-white">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Informations générales</h3>

                    <div class="mb-4">
                        <p class="font-medium text-gray-700 mb-1">Nom :</p>
                        <div class="bg-gray-100 p-3 rounded-md">{{ $contact->username }}</div>
                    </div>

                    <div class="mb-4">
                        <p class="font-medium text-gray-700 mb-1">Adresse email :</p>
                        <div class="bg-gray-100 p-3 rounded-md">{{ $contact->email }}</div>
                    </div>

                    <div class="mb-4">
                        <p class="font-medium text-gray-700 mb-1">Numéro de téléphone :</p>
                        <div class="bg-gray-100 p-3 rounded-md">{{ $contact->phoneNumber ?? 'Non renseigné' }}</div>
                    </div>

                    <div class="mb-4">
                        <p class="font-medium text-gray-700 mb-1">Sujet :</p>
                        <div class="bg-gray-100 p-3 rounded-md">{{ $contact->subject }}</div>
                    </div>

                    <div class="mb-4">
                        <p class="font-medium text-gray-700 mb-1">Message :</p>
                        <div class="bg-gray-100 p-3 rounded-md whitespace-pre-line">{{ $contact->message }}</div>
                    </div>
                </div>

                <!-- Dates -->
                <div class="border border-gray-200 p-6 rounded-lg bg-white">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Dates</h3>

                    <div class="mb-4">
                        <p class="font-medium text-gray-700 mb-1">Créé le :</p>
                        <div class="bg-gray-100 p-3 rounded-md">
                            {{ $contact->created_at->format('d/m/Y à H:i:s') }}
                        </div>
                    </div>

                    <div>
                        <p class="font-medium text-gray-700 mb-1">Dernière mise à jour :</p>
                        <div class="bg-gray-100 p-3 rounded-md">
                            {{ $contact->updated_at->format('d/m/Y à H:i:s') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
