<div class="space-y-6">
    <div>
        <label class="block text-sm font-medium text-gray-700">Titre</label>
        <input type="text" name="title" value="{{ old('title', $post->title ?? '') }}"
               class="w-full h-11 rounded-lg border px-4 py-2.5 text-sm text-gray-800" />
        @error('title') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Résumé</label>
        <input type="text" name="summary" value="{{ old('summary', $post->summary ?? '') }}"
               class="w-full h-11 rounded-lg border px-4 py-2.5 text-sm text-gray-800" />
        @error('summary') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Contenu</label>
        <textarea name="content" rows="5"
                  class="w-full rounded-lg border px-4 py-2.5 text-sm text-gray-800">{{ old('content', $post->content ?? '') }}</textarea>
        @error('content') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Image de couverture</label>
        <input type="file" name="cover_image"
               class="block w-full text-sm text-gray-800 file:mr-4 file:py-2 file:px-4 file:border-0 file:bg-blue-600 file:text-white file:rounded hover:file:bg-blue-700" />
        @if(isset($post) && $post->cover_image)
            <p class="mt-2"><img src="{{ asset('storage/' . $post->cover_image) }}" alt="Image de couverture" class="w-40 rounded"></p>
        @endif
        @error('cover_image') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Type de contenu</label>
        <select name="content_type" class="w-full h-11 rounded-lg border px-4 py-2.5 text-sm text-gray-800">
            <option value="">Sélectionner un type</option>
            @foreach(['BLOG', 'PROJECTS', 'NEWS'] as $type)
                <option value="{{ $type }}" {{ old('content_type', $post->content_type ?? '') === $type ? 'selected' : '' }}>{{ $type }}</option>
            @endforeach
        </select>
        @error('content_type') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Catégorie</label>
        <select name="category_id" class="w-full h-11 rounded-lg border px-4 py-2.5 text-sm text-gray-800">
            <option value="">Sélectionner une catégorie</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $post->category_id ?? '') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Lien de donation</label>
        <input type="text" name="donate_link" value="{{ old('donate_link', $post->donate_link ?? '') }}"
               class="w-full h-11 rounded-lg border px-4 py-2.5 text-sm text-gray-800" />
        @error('donate_link') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <div class="flex items-center space-x-2">
        <input type="checkbox" name="highlighting" id="highlighting" value="1"
            {{ old('highlighting', $post->highlighting ?? false) ? 'checked' : '' }}>
        <label for="highlighting" class="text-sm text-gray-700">Mettre en avant</label>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Date de publication</label>
        <input type="datetime-local" name="published_at"
               value="{{ old('published_at', isset($post->published_at) ? $post->published_at->format('Y-m-d\TH:i') : '') }}"
               class="w-full h-11 rounded-lg border px-4 py-2.5 text-sm text-gray-800" />
        @error('published_at') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            {{ isset($post) ? 'Mettre à jour' : 'Enregistrer' }}
        </button>
    </div>
</div>
