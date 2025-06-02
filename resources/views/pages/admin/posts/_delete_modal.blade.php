<div id="deleteModal{{ $post->id }}" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md">
        <form method="POST" action="{{ route('posts.destroy', $post) }}">
            @csrf
            @method('DELETE')
            <div class="px-6 py-4 border-b">
                <h2 class="text-lg font-semibold">Confirmation</h2>
            </div>
            <div class="p-6">
                <p>Voulez-vous vraiment supprimer <strong>{{ $post->title }}</strong> ?</p>
            </div>
            <div class="flex justify-end gap-2 px-6 py-4 border-t">
                <button type="button" class="px-4 py-2 text-gray-700 border rounded hover:bg-gray-100"
                        onclick="document.getElementById('deleteModal{{ $post->id }}').classList.add('hidden')">Annuler</button>
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Supprimer</button>
            </div>
        </form>
    </div>
</div>
