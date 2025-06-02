@extends('layouts.admin.app')

@section('title', 'Nouvelle catégorie')

@section('content')
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="space-y-6 p-5">
            <div>
                <label class="block text-sm font-medium text-gray-700">Nom de la catégorie</label>
                <input type="text" name="name" value="{{ old('name') }}"
                       class="h-11 w-full rounded-lg border bg-transparent px-4 py-2.5 text-sm text-gray-800" />
                @error('name')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" rows="3"
                          class="w-full rounded-lg border bg-transparent px-4 py-2.5 text-sm text-gray-800">{{ old('description') }}</textarea>
                @error('description')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Enregistrer</button>
            </div>
        </div>
    </form>

@endsection
