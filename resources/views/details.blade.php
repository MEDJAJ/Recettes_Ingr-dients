<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $recette->title }} - CookShare</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans">

    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 shadow-sm p-4">
        <div class="max-w-5xl mx-auto flex justify-between items-center">
            <a href="{{ route('dashboardhome') }}" class="text-xl font-bold text-gray-800 flex items-center group">
                <i class="fas fa-arrow-left mr-2 text-orange-500 group-hover:-translate-x-1 transition-transform"></i>
                Retour
            </a>
            
        </div>
    </nav>

    <main class="max-w-5xl mx-auto px-4 py-8">
        <div class="bg-white rounded-[2.5rem] overflow-hidden shadow-sm border border-gray-100 mb-8">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="h-[400px] md:h-full min-h-[400px]">
                    <img src="{{ asset('storage/' . $recette->image) }}" 
                         alt="{{ $recette->title }}" class="w-full h-full object-cover">
                </div>
                <div class="p-8 md:p-12 flex flex-col justify-center">
                    <span class="text-orange-500 font-bold uppercase tracking-widest text-xs mb-4">
                        {{ $recette->categorie->name ?? 'Plat' }}
                    </span>
                    <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-6 leading-tight">
                        {{ $recette->title }}
                    </h1>
                    <p class="text-gray-600 leading-relaxed mb-8 italic text-lg border-l-4 border-orange-200 pl-4">
                        "{{ $recette->description }}"
                    </p>
                    <div class="flex flex-wrap gap-6 text-sm font-medium text-gray-500">
                        <span class="flex items-center"><i class="far fa-clock text-orange-500 mr-2 text-lg"></i>20 min</span>
                        <span class="flex items-center"><i class="fas fa-utensils text-orange-500 mr-2 text-lg"></i>Facile</span>
                        <span class="flex items-center"><i class="fas fa-user-friends text-orange-500 mr-2 text-lg"></i>2 pers.</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-1">
                <div class="bg-white p-8 rounded-[2rem] shadow-sm sticky top-24 border border-orange-100">
                    <h3 class="text-xl font-bold mb-6 flex items-center text-gray-800">
                        <i class="fas fa-shopping-basket text-orange-500 mr-3"></i>Ingrédients
                    </h3>
                    <ul class="space-y-4">
                        @foreach($recette->ingredients as $ingredient)
                        <li class="flex items-start p-3 rounded-xl hover:bg-orange-50 transition-colors group">
                            <i class="fas fa-check-circle text-orange-300 mt-1 mr-3 group-hover:text-orange-500"></i>
                            <span class="text-gray-700 font-medium">{{ $ingredient->nom }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white p-8 md:p-10 rounded-[2rem] shadow-sm border border-gray-50">
                    <h3 class="text-xl font-bold mb-10 flex items-center text-gray-800">
                        <i class="fas fa-list-ol text-orange-500 mr-3"></i>Étapes de préparation
                    </h3>
                    
                    <div class="relative space-y-12">
                        @foreach($recette->etapes as $index => $etape)
                        <div class="flex gap-6 relative group">
                            @if(!$loop->last)
                            <div class="absolute left-6 top-12 bottom-[-3rem] w-0.5 bg-orange-100 group-hover:bg-orange-200 transition-colors"></div>
                            @endif

                            <div class="relative">
                                <span class="flex-shrink-0 z-10 w-12 h-12 bg-orange-500 text-white rounded-2xl flex items-center justify-center font-bold text-xl shadow-lg shadow-orange-200 transform group-hover:scale-110 transition-transform">
                                    {{ $etape->numero_ordre }}
                                </span>
                            </div>

                            <div class="flex-1 pt-1">
                                <h4 class="font-bold text-gray-900 text-lg mb-2">Étape {{ $etape->numero_ordre }}</h4>
                                <p class="text-gray-600 leading-relaxed text-lg italic">
                                    {{ $etape->description }}
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="bg-orange-50/50 p-8 rounded-[2rem] border-2 border-dashed border-orange-200">
                    <h3 class="text-xl font-bold mb-6 text-gray-800 flex items-center">
                        <i class="far fa-comments text-orange-500 mr-3"></i>Discussion
                    </h3>
                    
                    <div class="mb-8 flex gap-4">
                        <div class="w-12 h-12 rounded-full bg-orange-500 flex items-center justify-center text-white font-bold shadow-sm flex-shrink-0">
                            {{ substr(Auth::user()->name ?? 'U', 0, 1) }}
                        </div>
                        <form method="POST" action="{{ route('commentaires.store', $recette->id) }}">
                        @csrf
                        <div class="flex-1">
                            
                            <textarea name="contenu" placeholder="Un conseil ou une question sur cette recette ?" 
                                      class="w-full p-4 rounded-2xl border-none shadow-sm focus:ring-2 focus:ring-orange-400 outline-none min-h-[100px] bg-white"></textarea>
                            <button type="submit" class="mt-3 bg-gray-900 text-white px-8 py-3 rounded-xl font-bold hover:bg-orange-600 transition transform hover:-translate-y-1 active:scale-95 shadow-md">
                                Publier mon commentaire
                            </button>
                           
                        </div>
                         </form>
                    </div>

                    <div class="space-y-6">
  @foreach($recette->commentaires as $commentaire)
                        <div class="flex gap-4">
                            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center font-bold text-blue-600 flex-shrink-0 text-sm shadow-sm">U</div>
                            <div class="bg-white p-5 rounded-2xl shadow-sm flex-1 border border-gray-100">
                                <p class="font-bold text-sm text-gray-800 flex justify-between">
                                    user
                                    <span class="text-xs font-normal text-gray-400 italic">Il y a 2h</span>
                                </p>
                                <p class="text-gray-600 text-sm mt-2 leading-relaxed">
                                   {{$commentaire->contenu}}
                                </p>
                            </div>
                        </div>
                    </div>

@endforeach

                    

                </div>
            </div>
        </div>
    </main>

    <footer class="max-w-5xl mx-auto px-4 py-12 text-center text-gray-400 text-sm">
        <p>© 2026 CookShare - Partagez le goût du bonheur.</p>
    </footer>

</body>
</html>