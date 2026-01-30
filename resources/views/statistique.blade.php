<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Dashboard Culinaire</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-900">

    <div class="max-w-6xl mx-auto px-4 py-10">
        
        <header class="mb-10 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold tracking-tight">Vue d'ensemble</h1>
                <p class="text-gray-500 mt-1">Gérez vos créations et analysez vos succès.</p>
            </div>
           
        </header>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm flex items-center space-x-5">
                <div class="p-4 bg-orange-100 rounded-2xl">
                    <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Recettes publiées</p>
                    <p class="text-3xl font-bold">{{$count}}</p> </div>
            </div>

           

            
        </div>

        <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-gray-50 flex justify-between items-center">
                <h3 class="text-lg font-bold text-gray-800">Recettes les plus commentées</h3>
                <span class="text-xs font-bold uppercase tracking-wider text-orange-500 bg-orange-50 px-3 py-1 rounded-full">Top 3 Populaire</span>
            </div>

            <div class="divide-y divide-gray-50">

            @foreach($topRecettes as $recette)
                <div class="p-6 flex items-center justify-between hover:bg-gray-50 transition-colors">
                    <div class="flex items-center space-x-4">
                        <div class="w-16 h-16 rounded-2xl bg-gray-200 overflow-hidden shrink-0">
                            <img src="{{asset('storage/'.$recette->image)}}" alt="Plat" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-lg uppercase tracking-tight">{{$recette->title}}</h4>
                            <p class="text-sm text-gray-500 italic">Publié il y a 2 jours</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="flex items-center space-x-1 text-orange-600 bg-orange-50 px-3 py-1.5 rounded-lg">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zm-4 0H9v2h2V9z"></path></svg>
                            <span class="font-bold">{{ $recette->commentaires_count }}</span>
                        </div>
                        <p class="text-xs text-gray-400 mt-1 uppercase font-semibold">Commentaires</p>
                    </div>
                </div>

@endforeach

               
            
            
        </div>

    </div>

</body>
</html>