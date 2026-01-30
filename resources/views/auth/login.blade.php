<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - CookShare</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-orange-50 min-h-screen flex items-center justify-center p-4">

    <div class="bg-white p-8 rounded-3xl shadow-xl w-full max-w-md border border-orange-100">
        
        <div class="text-center mb-8">
            <div class="inline-block p-3 bg-orange-100 rounded-full mb-4">
                <i class="fas fa-cookie-bite text-orange-500 text-2xl"></i>
            </div>
            <h1 class="text-3xl font-bold text-gray-800">Bon retour !</h1>
            <p class="text-gray-500 mt-2">Prêt à cuisiner de nouvelles idées ?</p>
        </div>

        <form id="loginForm" class="space-y-6" method="POST" action="/login">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Adresse Email</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                        <i class="fas fa-at"></i>
                    </span>
                    <input type="email" id="email" name="email" required
                        class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-orange-400 focus:border-transparent outline-none transition duration-200"
                        placeholder="chef@cuisine.com">
                </div>
            </div>

            <div>
                <div class="flex justify-between mb-1">
                    <label class="text-sm font-medium text-gray-700">Mot de passe</label>
                    <a href="#" class="text-xs text-orange-500 hover:underline">Oublié ?</a>
                </div>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                        <i class="fas fa-key"></i>
                    </span>
                    <input type="password" id="password" name="password" required
                        class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-orange-400 focus:border-transparent outline-none transition duration-200"
                        placeholder="••••••••">
                </div>
            </div>

            <div class="flex items-center">
                <input type="checkbox" id="remember" class="w-4 h-4 text-orange-500 border-gray-300 rounded focus:ring-orange-400">
                <label for="remember" class="ml-2 text-sm text-gray-600">Se souvenir de moi</label>
            </div>

            <button type="submit" 
                class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 rounded-xl shadow-lg shadow-orange-200 transition duration-300 transform hover:scale-[1.02] active:scale-95">
                Se connecter
            </button>
        </form>

        <div class="mt-8 text-center border-t border-gray-100 pt-6">
            <p class="text-gray-600 text-sm">
                Pas encore de compte ? 
                <a href="/register" class="text-orange-500 font-bold hover:text-orange-600 transition">Créer un profil</a>
            </p>
        </div>
    </div>

    <script>
      
    </script>

</body>
</html>