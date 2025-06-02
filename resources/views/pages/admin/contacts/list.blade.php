@extends('layouts.admin.app')

@section('title', 'Messages reçus')

@section('content')
    <div class="space-y-5 sm:space-y-6">
        <div class="rounded-2xl border border-gray-200 bg-white">
            <div class="p-5 border-t border-gray-100 sm:p-6">
                @if($contacts->count())
                    <div class="w-full overflow-auto rounded-xl border border-gray-200 bg-white">
                        <table class="w-full table-auto">
                            <thead>
                            <tr class="bg-gray-50 text-left text-sm font-medium text-gray-600">
                                <th class="px-5 py-3">Nom</th>
                                <th class="px-5 py-3">Email</th>
                                <th class="px-5 py-3">Téléphone</th>
                                <th class="px-5 py-3">Sujet</th>
                                <th class="px-5 py-3">Reçu le</th>
                                <th class="px-5 py-3">Actions</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                            @foreach($contacts as $contact)
                                <tr>
                                    <td class="px-5 py-4">{{ $contact->username }}</td>
                                    <td class="px-5 py-4">{{ $contact->email }}</td>
                                    <td class="px-5 py-4">{{ $contact->phoneNumber }}</td>
                                    <td class="px-5 py-4">{{ $contact->subject }}</td>
                                    <td class="px-5 py-4">{{ $contact->created_at->format('d/m/Y à H:i') }}</td>
                                    <td class="px-5 py-4 flex items-center gap-2">
                                        <a href="{{ route('contacts.show', $contact->id) }}" class="text-blue-600 hover:underline">Voir</a>
                                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Supprimer ce message ?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $contacts->links() }}
                    </div>
                @else
                    <p class="text-gray-500">Aucun message pour le moment.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
