<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la Recette</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 py-12 px-4">

    <div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Modifier la recette</h2>

        <form action="{{ route('recettes.update', $recette->id) }}"
              method="POST"
              enctype="multipart/form-data"
              class="space-y-6">

            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Titre de la recette</label>
                <input type="text"
                       id="title"
                       name="title"
                       value="{{ old('title', $recette->title) }}"
                       placeholder="Ex: Tarte aux pommes grand-mère"
                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none transition-all duration-200 bg-gray-50 focus:bg-white">
            </div>

            <div>
                <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Description / Instructions</label>
                <textarea id="description"
                          name="description"
                          rows="5"
                          placeholder="Décrivez les étapes de préparation..."
                          class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none transition-all duration-200 bg-gray-50 focus:bg-white resize-none">{{ old('description', $recette->description) }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Image de couverture</label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:border-orange-400 transition-colors cursor-pointer bg-gray-50">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600 justify-center">
                            <label for="image" class="relative cursor-pointer bg-transparent rounded-md font-medium text-orange-600 hover:text-orange-500 focus-within:outline-none">
                                <span>Télécharger un fichier</span>
                                <input id="image" name="image" type="file" class="sr-only">
                            </label>
                            <p class="pl-1 text-gray-500">ou glisser-déposer</p>
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG jusqu'à 10MB</p>
                    </div>
                </div>
                
                @if(isset($recette->image))
                    <div class="mt-3 flex items-center space-x-2 text-xs text-gray-400 italic font-medium">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span>Fichier actuel : {{ basename($recette->image) }}</span>
                    </div>
                @endif
            </div>

            <div class="flex items-center justify-end space-x-4 pt-4 border-t border-gray-50">
                <a href="{{ url()->previous() }}" class="text-sm font-semibold text-gray-500 hover:text-gray-700 transition-colors">
                    Annuler
                </a>
                <button type="submit"
                        class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-3 rounded-xl font-bold shadow-lg shadow-orange-200 transform active:scale-95 transition-all duration-200">
                    Mettre à jour
                </button>
            </div>
        </form>
    </div>

</body>
</html>