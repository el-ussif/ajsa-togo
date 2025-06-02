@extends('layouts.admin.app')

@section('title', 'Contenus')

@section('content')
    <div class="space-y-5 sm:space-y-6">
        <div class="rounded-2xl border border-gray-200 bg-white dark::border-gray-800 dark::bg-white/[0.03]">
            <div class="flex justify-end items-center p-4">
                <a href="{{ route('posts.create') }}" class="inline-flex items-center gap-2 px-4 py-3 text-sm font-medium text-white transition rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600">
                    Nouveau contenu
                </a>
            </div>

            <div class="p-5 border-t border-gray-100 dark::border-gray-800 sm:p-6">
                @if($posts->count())
                    <div class="w-full overflow-hidden rounded-xl border border-gray-200 bg-white dark::border-gray-800 dark::bg-white/[0.03]">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full min-w-full table-auto">
                                <thead>
                                <tr class="border-b border-gray-100 dark::border-gray-800">
                                    <th class="px-5 py-3 text-left text-sm font-medium text-gray-500">ID</th>
                                    <th class="px-5 py-3 text-left text-sm font-medium text-gray-500">Titre</th>
                                    <th class="px-5 py-3 text-left text-sm font-medium text-gray-500">Type</th>
                                    <th class="px-5 py-3 text-left text-sm font-medium text-gray-500">Catégorie</th>
                                    <th class="px-5 py-3 text-left text-sm font-medium text-gray-500">Auteur</th>
                                    <th class="px-5 py-3 text-left text-sm font-medium text-gray-500">Mise en avant</th>
                                    <th class="px-5 py-3 text-left text-sm font-medium text-gray-500">Publié le</th>
                                    <th class="px-5 py-3 text-left text-sm font-medium text-gray-500">Actions</th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100 dark::divide-gray-800">
                                @foreach($posts as $content)
                                    <tr>
                                        <td class="px-5 py-4">#{{ $content->id }}</td>
                                        <td class="px-5 py-4 text-gray-700">{{ $content->title }}</td>
                                        <td class="px-5 py-4">{{ $content->content_type }}</td>
                                        <td class="px-5 py-4">{{ $content->category->name ?? '-' }}</td>
                                        <td class="px-5 py-4">{{ $content->author->name ?? '-' }}</td>
                                        <td class="px-5 py-4">
                                            @if($content->highlighting)
                                                <span class="text-green-600 font-semibold">Oui</span>
                                            @else
                                                <span class="text-gray-400">Non</span>
                                            @endif
                                        </td>
                                        <td class="px-5 py-4">{{ $content->published_at ? $content->published_at->format('d/m/Y H:i') : '-' }}</td>
                                        <td class="px-5 py-4 space-x-2 w-[290px]">
                                            <a href="{{ route('posts.show', $content) }}" class="px-3 py-1 text-white bg-blue-500 hover:bg-blue-600 text-sm rounded">Voir</a>
                                            <a href="{{ route('posts.edit', $content) }}" class="px-3 py-1 text-white bg-yellow-500 hover:bg-yellow-600 text-sm rounded">Modifier</a>
                                            <button onclick="document.getElementById('deleteModal{{ $content->id }}').classList.remove('hidden')" class="px-3 py-1 text-white bg-red-500 hover:bg-red-600 text-sm rounded">
                                                Supprimer
                                            </button>

                                            <!-- Modal de confirmation -->
                                            <div id="deleteModal{{ $content->id }}" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
                                                <div class="bg-white rounded-lg shadow-lg w-full max-w-md">
                                                    <form method="POST" action="{{ route('posts.destroy', $content) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="px-6 py-4 border-b">
                                                            <h2 class="text-lg font-semibold">Confirmation</h2>
                                                        </div>
                                                        <div class="p-6">
                                                            <p>Confirmez-vous la suppression de <strong>{{ $content->title }}</strong> ?</p>
                                                        </div>
                                                        <div class="flex justify-end gap-2 px-6 py-4 border-t">
                                                            <button type="button" class="px-4 py-2 text-gray-700 border rounded hover:bg-gray-100" onclick="document.getElementById('deleteModal{{ $content->id }}').classList.add('hidden')">
                                                                Annuler
                                                            </button>
                                                            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Supprimer</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="p-4 bg-blue-100 text-blue-800 rounded">Aucun contenu trouvé.</div>
                @endif

                <div class="d-flex justify-content-center mt-8">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
