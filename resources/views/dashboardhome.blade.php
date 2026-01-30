<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Espace Chef - CookShare</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-slate-50 font-sans">

    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-orange-100">
        <div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <div class="bg-orange-500 p-2 rounded-xl shadow-lg shadow-orange-200">
                    <i class="fas fa-utensils text-white text-xl"></i>
                </div>
                <span class="text-2xl font-black text-slate-800">L'Art de <span class="text-orange-500">Cuisiner</span></span>
            </div>

            <div class="hidden md:flex items-center gap-8 text-slate-600 font-medium">
                <a href="#" class="hover:text-orange-500 transition border-b-2 border-orange-500 text-orange-500 pb-1">Recettes</a>
                <a href="/statistique" class="hover:text-orange-500 transition">Statistiques</a>
            </div>

            <div class="flex items-center gap-4">
                <a href="/creationrecette">
                    <button class="hidden sm:flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white px-5 py-2.5 rounded-xl font-bold transition shadow-md">
                        <i class="fas fa-plus-circle"></i> Publier
                    </button>
                </a>
                <div class="w-10 h-10 rounded-full bg-orange-100 border-2 border-white shadow-sm flex items-center justify-center text-orange-600 cursor-pointer">
                    <i class="fas fa-user"></i>
                </div>
            </div>
        </div>
    </nav>

    <header class="relative overflow-hidden bg-slate-900 py-16 sm:py-24">
        <img src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?auto=format&fit=crop&w=1500&q=80" 
             class="absolute inset-0 w-full h-full object-cover opacity-40" alt="Cooking background">
        
        <div class="relative max-w-7xl mx-auto px-6 text-center lg:text-left flex flex-col lg:flex-row items-center justify-between gap-10">
            <div class="max-w-2xl">
                <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6">
                    Bonjour, <span class="text-orange-400">{{$user->name}}! </span> 👨‍🍳
                </h1>
                <p class="text-lg md:text-xl text-slate-200 mb-8 leading-relaxed">
                    Votre cuisine est votre terrain de jeu. Partagez votre passion, gérez vos créations et découvrez ce que la communauté prépare aujourd'hui.
                </p>
            </div>
            
           
        </div>
    </header>

    <section class="max-w-7xl mx-auto px-6 -mt-10 relative z-20">
        <form action="{{ route('recettes.index') }}" method="GET" class="bg-white p-4 rounded-[2.5rem] shadow-xl border border-slate-100 flex flex-col md:flex-row gap-4 items-center">
            
            <div class="relative flex-grow w-full">
                <input type="text" 
                       name="search"
                       placeholder="Rechercher par titre..." 
                       class="w-full pl-6 pr-14 py-4 bg-slate-50 border-transparent rounded-2xl focus:bg-white focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all outline-none text-slate-700 font-medium">
                
                <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2 w-10 h-10 bg-orange-500 hover:bg-orange-600 text-white rounded-xl flex items-center justify-center transition shadow-lg shadow-orange-200">
                    <i class="fas fa-search text-sm"></i>
                </button>
            </div>
            
            <div class="flex w-full md:w-auto items-center gap-3">
                <div class="relative w-full md:w-64">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                        <i class="fas fa-tag text-orange-500"></i>
                    </div>
                    <select name="category" 
                            class="block w-full pl-12 pr-10 py-4 bg-slate-50 border-transparent rounded-2xl focus:bg-white focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all outline-none text-slate-700 font-bold appearance-none cursor-pointer">
                        <option value="">Toutes les catégories</option>
                        @foreach($recettes->unique('categorie_id') as $item)
                            <option value="{{ $item->categorie->id }}">{{ $item->categorie->name }}</option>
                        @endforeach
                    </select>
                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-slate-400">
                        <i class="fas fa-chevron-down text-xs"></i>
                    </div>
                </div>

                <button type="submit" class="bg-slate-900 hover:bg-orange-500 text-white px-8 py-4 rounded-2xl font-bold transition-all shadow-lg active:scale-95 whitespace-nowrap">
                    Filtrer
                </button>
            </div>
            
        </form>
    </section>

    <main class="max-w-7xl mx-auto px-6 py-16">
        <div class="flex items-center justify-between mb-12">
            <h2 class="text-3xl font-extrabold text-slate-800">Vos dernières publications</h2>
            <div class="flex gap-3">
                <button class="w-11 h-11 flex items-center justify-center bg-white rounded-xl shadow-sm border border-slate-100 text-orange-500 transition-all"><i class="fas fa-th-large"></i></button>
                <button class="w-11 h-11 flex items-center justify-center bg-white rounded-xl shadow-sm border border-slate-100 text-slate-400 transition-all"><i class="fas fa-list"></i></button>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach($recettes as $recette)
                <div class="bg-white rounded-[2.8rem] p-5 shadow-sm hover:shadow-2xl hover:-translate-y-3 transition-all duration-500 border border-slate-100 group">
                    
                    <div class="relative mb-6">
                        <img src="{{ asset('storage/' . $recette->image) }}" 
                             class="w-full h-64 object-cover rounded-[2.2rem]" alt="{{ $recette->title }}">

                        @if($user->id == $recette->user_id)
                        <div class="absolute top-5 left-5 flex gap-2">
                            <a href="{{ route('recettes.edit', $recette->id) }}" 
                               class="bg-white/95 backdrop-blur w-10 h-10 rounded-2xl flex items-center justify-center text-blue-500 hover:bg-blue-500 hover:text-white transition shadow-xl">
                                <i class="fas fa-pen text-sm"></i>
                            </a>

                            <form action="{{ route('recettes.destroy', $recette->id) }}" method="POST" onsubmit="return confirm('Supprimer cette recette ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-white/95 backdrop-blur w-10 h-10 rounded-2xl flex items-center justify-center text-red-500 hover:bg-red-500 hover:text-white transition shadow-xl">
                                    <i class="fas fa-trash text-sm"></i>
                                </button>
                            </form>
                        </div>
                        @endif

                        <div class="absolute top-5 right-5 bg-white/95 backdrop-blur px-4 py-2 rounded-2xl flex items-center gap-2 shadow-md">
                            <i class="fas fa-carrot text-orange-500 text-xs"></i>
                            <span class="text-xs font-bold text-slate-800">{{ $recette->categorie->name }}</span>
                        </div>
                    </div>

                    <div class="px-3 pb-3">
                        <h3 class="text-2xl font-black text-slate-800 group-hover:text-orange-500 transition uppercase tracking-tight mb-2">
                            {{ $recette->title }}
                        </h3>
                        <p class="text-slate-500 text-sm mb-6 line-clamp-2 leading-relaxed">
                             {{ $recette->description }}
                        </p>

                        <div class="flex items-center justify-between border-t border-slate-50 pt-5">
                            <span class="text-sm text-slate-700 font-bold">{{ $recette->created_at->format('d M Y') }}</span>
                            <a href="/recettes/{{$recette->id}}">
                                <button class="bg-slate-900 text-white px-6 py-3 rounded-2xl text-sm font-black hover:bg-orange-500 transition-all shadow-lg">
                                    Détails
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

</body>
</html>