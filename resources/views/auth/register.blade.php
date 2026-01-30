<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - CookShare</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-orange-50 min-h-screen flex items-center justify-center p-4">

    <div class="bg-white p-8 rounded-3xl shadow-xl w-full max-w-md border border-orange-100">
        
        <div class="text-center mb-8">
            <div class="inline-block p-3 bg-orange-100 rounded-full mb-4">
                <i class="fas fa-utensils text-orange-500 text-2xl"></i>
            </div>
            <h1 class="text-3xl font-bold text-gray-800">Créer un compte</h1>
            <p class="text-gray-500 mt-2">Rejoignez notre communauté de chefs !</p>
        </div>

        <form id="registerForm" class="space-y-5" method="POST" action="/register">
              @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nom complet</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                        <i class="fas fa-user"></i>
                    </span>
                    <input type="text" id="fullname" name="name" required
                        class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-orange-400 focus:border-transparent outline-none transition"
                        placeholder="Chef Gourmet">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <input type="email" id="email" name="email" required
                        class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-orange-400 focus:border-transparent outline-none transition"
                        placeholder="exemple@mail.com">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                        <i class="fas fa-lock"></i>
                    </span>
                    <input type="password" id="password" name="password" required
                        class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-orange-400 focus:border-transparent outline-none transition"
                        placeholder="••••••••">
                </div>
            </div>

            <button type="submit" 
                class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 rounded-xl shadow-lg shadow-orange-200 transition duration-300 transform hover:-translate-y-1">
                S'inscrire maintenant
            </button>
        </form>

        <div class="mt-8 text-center">
            <p class="text-gray-600 text-sm">
                Déjà un compte ? 
                <a href="/login" class="text-orange-500 font-semibold hover:underline">Se connecter</a>
            </p>
        </div>
    </div>

    <script>
      
    </script>

</body>
</html>