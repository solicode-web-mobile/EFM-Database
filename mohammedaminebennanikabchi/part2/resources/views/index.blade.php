
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Stratégies et Avis</h2>
    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-green-500 text-white">
                <th class="py-3 px-4 text-left">ID</th>
                <th class="py-3 px-4 text-left">Titre de la Stratégie</th>
                <th class="py-3 px-4 text-left">Contenu de l'Avis</th>
                <th class="py-3 px-4 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($strategies as $strategy)
                @foreach ($strategy->avie as $item) <!-- Supposant que vous avez une relation entre stratégie et avis -->
                    <tr class="border-b hover:bg-gray-100">
                        <td class="py-2 px-4">{{ $item->id }}</td>
                        <td class="py-2 px-4">{{ $strategy->title }}</td>
                        <td class="py-2 px-4">{{ $item->content }}</td>
                        <td class="py-2 px-4">
                            <a href="{{ route('avis_edit', $item->id) }}" class="text-blue-500 hover:text-blue-700">Modifier</a>
                            <form action="{{ route('avis_delete', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 ml-2" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet avis ?');">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
