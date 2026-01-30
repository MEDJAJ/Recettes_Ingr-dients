<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publier une Recette - CookShare</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-orange-50/30 min-h-screen font-sans">

    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-orange-100">
        <div class="max-w-5xl mx-auto px-6 h-16 flex items-center justify-between">
            <a href="{{route('dashboardhome')}}" class="text-gray-600 hover:text-orange-500 transition flex items-center gap-2">
                <i class="fas fa-times"></i> Annuler
            </a>
            <span class="font-bold text-gray-800 text-lg">Nouvelle Recette</span>
           
        </div>
    </nav>

    <main class="max-w-3xl mx-auto px-6 py-10">
        
        <form id="recipeForm" class="space-y-10" method="POST" action="{{ route('recettes.store') }}" enctype="multipart/form-data">
            @csrf
            <section class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-orange-100">
                <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                    <span class="bg-orange-100 text-orange-600 w-8 h-8 rounded-full flex items-center justify-center text-sm">1</span>
                    L'essentiel
                </h2>
                
                <div class="space-y-6">
                    <div class="relative group cursor-pointer border-2 border-dashed border-orange-200 rounded-[2rem] h-64 flex flex-col items-center justify-center bg-orange-50/50 hover:bg-orange-50 transition overflow-hidden">
                        <i class="fas fa-camera text-4xl text-orange-300 mb-2 group-hover:scale-110 transition"></i>
                        <span class="text-orange-500 font-medium">Ajouter une photo gourmande</span>
                        <p class="text-xs text-orange-300 mt-1">PNG, JPG jusqu'à 10MB</p>
                        <input name="image" type="file" class="absolute inset-0 opacity-0 cursor-pointer">
                    </div>

                    <div>
                        <input name="title" type="text" placeholder="Nom de votre plat (ex: Tarte Tatin de mamie)" 
                            class="w-full text-3xl font-bold border-none focus:ring-0 placeholder:text-gray-300 p-0 mb-2">
                        <div class="h-px bg-gray-100 w-full mb-6"></div>
                    </div>

                    <div class="relative">
                        <label class="block text-sm font-bold text-gray-400 mb-2 ml-1 uppercase tracking-wider">Catégorie de plat</label>
                        <div class="relative">
                           <select 
    name="categorie_id"
    class="w-full appearance-none bg-orange-50/50 border border-orange-100 text-gray-700 py-3 px-5 rounded-2xl focus:ring-2 focus:ring-orange-400 focus:bg-white outline-none transition cursor-pointer"
>
    <option value="" disabled selected>
        Choisir une catégorie...
    </option>

    @foreach ($categories as $categorie)
        <option value="{{ $categorie->id }}">
          {{ $categorie->name }}
        </option>
    @endforeach
</select>

                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-5 text-orange-500">
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                    </div>

                    <textarea name="description" placeholder="Racontez-nous l'histoire de cette recette en quelques mots..." 
                        class="w-full border-none focus:ring-0 placeholder:text-gray-400 p-0 min-h-[100px] text-gray-600 italic"></textarea>
                </div>
            </section>

            <section class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-orange-100">
                <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                    <span class="bg-orange-100 text-orange-600 w-8 h-8 rounded-full flex items-center justify-center text-sm">2</span>
                    Ingrédients
                </h2>
                <div id="ingredientList" class="space-y-4">
                    <div class="flex gap-4">
                        <input name="ingredients[]" type="text" placeholder="ex: 200g de farine" 
                            class="flex-1 bg-gray-50 border-none rounded-2xl px-5 py-3 focus:ring-2 focus:ring-orange-400 outline-none">
                        <button type="button" class="text-gray-300 hover:text-red-400 transition px-2"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
                <button type="button" onclick="addIngredient()" class="mt-6 text-orange-500 font-bold flex items-center gap-2 hover:scale-105 transition">
                    <i class="fas fa-plus-circle"></i> Ajouter un ingrédient
                </button>
            </section>

            <section class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-orange-100">
                <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                    <span class="bg-orange-100 text-orange-600 w-8 h-8 rounded-full flex items-center justify-center text-sm">3</span>
                    Préparation
                </h2>
                <div id="stepList" class="space-y-6">
                    <div class="flex gap-4">
                        <div class="flex-shrink-0 w-8 h-8 bg-gray-800 text-white rounded-lg flex items-center justify-center font-bold text-sm mt-2">1</div>
                        <textarea name="etapes[]" placeholder="Première étape : commencez par..." 
                            class="flex-1 bg-gray-50 border-none rounded-2xl px-5 py-3 focus:ring-2 focus:ring-orange-400 outline-none min-h-[80px]"></textarea>
                    </div>
                </div>
                <button type="button" onclick="addStep()" class="mt-6 text-orange-500 font-bold flex items-center gap-2 hover:scale-105 transition">
                    <i class="fas fa-plus-circle"></i> Ajouter une étape
                </button>
            </section>

            <div class="pt-6 pb-12">
                <button type="submit" class="w-full bg-slate-900 text-white py-5 rounded-[2rem] font-bold text-xl shadow-xl hover:bg-orange-500 transition-all transform hover:-translate-y-1 active:scale-95 flex items-center justify-center gap-3">
                    <i class="fas fa-paper-plane"></i> Partager ma recette
                </button>
                <p class="text-center text-gray-400 text-sm mt-4">En publiant, votre recette sera visible par toute la communauté CookShare.</p>
            </div>

        </form>
    </main>

    <script>
        function addIngredient() {
            const list = document.getElementById('ingredientList');
            const div = document.createElement('div');
            div.className = "flex gap-4 animate-fadeIn";
            div.innerHTML = `
                <input name="ingredients[]" type="text" placeholder="Nouvel ingrédient" class="flex-1 bg-gray-50 border-none rounded-2xl px-5 py-3 focus:ring-2 focus:ring-orange-400 outline-none">
                <button type="button" onclick="this.parentElement.remove()" class="text-gray-300 hover:text-red-400 transition px-2"><i class="fas fa-trash"></i></button>
            `;
            list.appendChild(div);
        }

        function addStep() {
            const list = document.getElementById('stepList');
            const stepCount = list.children.length + 1;
            const div = document.createElement('div');
            div.className = "flex gap-4 animate-fadeIn";
            div.innerHTML = `
                <div class="flex-shrink-0 w-8 h-8 bg-gray-800 text-white rounded-lg flex items-center justify-center font-bold text-sm mt-2">${stepCount}</div>
                <textarea name="etapes[]" placeholder="Étape suivante..." class="flex-1 bg-gray-50 border-none rounded-2xl px-5 py-3 focus:ring-2 focus:ring-orange-400 outline-none min-h-[80px]"></textarea>
                <button type="button" onclick="this.parentElement.remove()" class="text-gray-300 hover:text-red-400 transition px-2"><i class="fas fa-trash"></i></button>
            `;
            list.appendChild(div);
        }
    </script>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeIn { animation: fadeIn 0.3s ease-out forwards; }
        
        /* Style pour masquer la flèche par défaut du select sur certains navigateurs */
        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }
    </style>

</body>
</html>