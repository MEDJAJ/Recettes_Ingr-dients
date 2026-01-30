<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CookShare - Découvrez des recettes savoureuses</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .hero-gradient {
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans">

    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center gap-2">
                    <div class="bg-orange-500 p-2 rounded-lg text-white">
                        <i class="fas fa-utensils text-xl"></i>
                    </div>
                   
                <span class="text-2xl font-black text-slate-800">L'Art de <span class="text-orange-500">Cuisiner</span></span>
                </div>

                <div>
                    <a href="/login" class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2.5 rounded-full font-semibold transition duration-300 shadow-md flex items-center gap-2">
                        <i class="fas fa-user-circle"></i> Se connecter
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <header class="hero-gradient h-[500px] flex items-center justify-center text-center text-white px-4">
        <div class="max-w-3xl transform transition duration-700 hover:scale-105">
            <h1 class="text-5xl md:text-6xl font-extrabold mb-6 leading-tight">Cuisinez, Partagez, Savourez.</h1>
            <p class="text-xl md:text-2xl mb-8 text-gray-200">Découvrez des milliers de recettes créées par notre communauté et partagez vos propres chefs-d'œuvre culinaires.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-4 rounded-xl font-bold text-lg shadow-lg transition">Explorer les recettes</button>
                <button class="bg-white/20 hover:bg-white/30 backdrop-blur-md border border-white/50 text-white px-8 py-4 rounded-xl font-bold text-lg transition">Publier une recette</button>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 py-16">
        <div class="flex justify-between items-end mb-10">
            <div>
                <h2 class="text-3xl font-bold text-gray-800">Dernières pépites</h2>
                <div class="h-1 w-20 bg-orange-500 mt-2 rounded-full"></div>
            </div>
            
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <div class="bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow duration-300 border border-gray-100 group">
                <div class="relative overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&w=800&q=80" alt="Recette" class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-500">
                    <span class="absolute top-4 left-4 bg-white/90 backdrop-blur px-3 py-1 rounded-lg text-sm font-bold text-orange-600">Plat</span>
                </div>
                <div class="p-6">
                    <div class="flex items-center text-xs text-gray-400 mb-3">
                        <i class="far fa-calendar-alt mr-2"></i> Publié le 27 Jan. 2026
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-orange-500 transition">Salade Bowl Avocat & Saumon</h3>
                    <p class="text-gray-600 text-sm mb-6 line-clamp-2 italic">Un mélange frais et croquant parfait pour un déjeuner sain et rapide en semaine...</p>
                    <button class="w-full bg-orange-50 text-orange-600 hover:bg-orange-500 hover:text-white font-bold py-3 rounded-xl transition duration-300">
                        Voir les détails
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow duration-300 border border-gray-100 group">
                <div class="relative overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1567620905732-2d1ec7bb7445?auto=format&fit=crop&w=800&q=80" alt="Recette" class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-500">
                    <span class="absolute top-4 left-4 bg-white/90 backdrop-blur px-3 py-1 rounded-lg text-sm font-bold text-orange-600">Dessert</span>
                </div>
                <div class="p-6">
                    <div class="flex items-center text-xs text-gray-400 mb-3">
                        <i class="far fa-calendar-alt mr-2"></i> Publié le 25 Jan. 2026
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-orange-500 transition">Pancakes Moelleux au Miel</h3>
                    <p class="text-gray-600 text-sm mb-6 line-clamp-2 italic">Le secret pour des pancakes ultra-aériens qui raviront vos matins en famille...</p>
                    <button class="w-full bg-orange-50 text-orange-600 hover:bg-orange-500 hover:text-white font-bold py-3 rounded-xl transition duration-300">
                        Voir les détails
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow duration-300 border border-gray-100 group">
                <div class="relative overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?auto=format&fit=crop&w=800&q=80" alt="Recette" class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-500">
                    <span class="absolute top-4 left-4 bg-white/90 backdrop-blur px-3 py-1 rounded-lg text-sm font-bold text-orange-600">Santé</span>
                </div>
                <div class="p-6">
                    <div class="flex items-center text-xs text-gray-400 mb-3">
                        <i class="far fa-calendar-alt mr-2"></i> Publié le 24 Jan. 2026
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-orange-500 transition">Bol de Légumes rôtis</h3>
                    <p class="text-gray-600 text-sm mb-6 line-clamp-2 italic">Une explosion de saveurs automnales avec une sauce tahini faite maison...</p>
                    <button class="w-full bg-orange-50 text-orange-600 hover:bg-orange-500 hover:text-white font-bold py-3 rounded-xl transition duration-300">
                        Voir les détails
                    </button>
                </div>
            </div>

        </div>
    </main>

    <footer class="bg-white border-t py-8 mt-12">
        <div class="text-center text-gray-500 text-sm">
            © 2026 CookShare - Fait avec <i class="fas fa-heart text-red-500"></i> pour les passionnés de cuisine.
        </div>
    </footer>

</body>
</html>