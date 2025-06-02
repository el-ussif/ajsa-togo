@extends('layouts.admin.app')

@section('title', 'Catégories')

@section('content')

    <!-- Breadcrumb End -->

    <div class="space-y-5 sm:space-y-6">
        <div
            class="rounded-2xl border border-gray-200 bg-white dark::border-gray-800 dark::bg-white/[0.03]"
        >
            <div class="flex justify-end items-center p-4">
                <a href="{{ route('categories.create') }}" class="inline-flex items-center gap-2 px-4 py-3 text-sm font-medium text-white transition rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600">
                    Nouvelle catégorie
                </a>
            </div>

            <div
                class="p-5 border-t border-gray-100 dark::border-gray-800 sm:p-6"
            >

                @if($categories->count())
                    <div class="w-full overflow-hidden rounded-xl border border-gray-200 bg-white dark::border-gray-800 dark::bg-white/[0.03]">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full min-w-full table-auto">
                                <!-- table header start -->
                                <thead>
                                <tr class="border-b border-gray-100 dark::border-gray-800">
                                    <th class="px-5 py-3 text-left">
                                        <p class="font-medium text-gray-500 text-sm dark::text-gray-400">ID</p>
                                    </th>
                                    <th class="px-5 py-3 text-left">
                                        <p class="font-medium text-gray-500 text-sm dark::text-gray-400 w-full">Nom</p>
                                    </th>
                                    <th class="px-5 py-3 text-left">
                                        <p class="font-medium text-gray-500 text-sm dark::text-gray-400">Date création</p>
                                    </th>
                                    <th class="px-5 py-3 text-left">
                                        <p class="font-medium text-gray-500 text-sm dark::text-gray-400">Action</p>
                                    </th>
                                </tr>
                                </thead>
                                <!-- table body start -->
                                <tbody class="divide-y divide-gray-100 dark::divide-gray-800">
                                @foreach($categories as $category)
                                    <tr>
                                        <td class="px-5 py-4 w-16">#{{ $category->id }}</td>
                                        <td class="px-5 py-4 text-gray-700 dark::text-gray-400 w-">{{ $category->name }}</td>
                                        <td class="px-5 py-4 w-48">{{ $category->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="px-5 py-4 space-x-2 w-[290px]">
                                            <a href="{{ route('categories.show', $category) }}" class="px-3 py-1 text-white bg-blue-500 hover:bg-blue-600 text-sm rounded">Voir</a>
                                            <a href="{{ route('categories.edit', $category) }}" class="px-3 py-1 text-white bg-yellow-500 hover:bg-yellow-600 text-sm rounded">Modifier</a>
                                            <button
                                                class="px-3 py-1 text-white bg-red-500 hover:bg-red-600 text-sm rounded"
                                                onclick="document.getElementById('deleteModal{{ $category->id }}').classList.remove('hidden')"
                                            >
                                                Supprimer
                                            </button>

                                            <!-- Modal de confirmation -->
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
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="p-4 bg-blue-100 text-blue-800 rounded">Aucune catégorie trouvée.</div>
                @endif
            <div class="d-flex justify-content-center mt-8">
                {{ $categories->links() }}
            </div>
    </div>
@endsection
