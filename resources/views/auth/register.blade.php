<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Vampiro+One&display=swap" rel="stylesheet">
    <title>Inscription</title>
    <style>
        .title{
            font-family: 'Vampiro One', cursive;
            color:#f14668;
        }
    </style>
</head>
<body class="container mx-auto bg-blue-100">
    <div class="sm:w-2/3 max-w-6xl mx-auto mt-8 sm:px-6 lg:px-8 bg-blue-100 rounded-lg">
        <div class="max-w-md mx-auto">
            <h1 class="title text-4xl text-center pt-8">Vamp Perso</h1>
            
            <h2 class="text-xl my-4 text-center">Créez votre compte dès maintenant</h2>
    
            @if ($errors->any())
                <div class="text-center text-red-500 mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="flex flex-col" action="/register" method="POST">
                @csrf
                
                <label class="text-center" for="email">Nom</label>
                <input class="w-2/3 mx-auto py-1 px-4 bg-white focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent rounded-lg" type="text" name="name">

                <label class="text-center mt-4" for="email">Email</label>
                <input class="w-2/3 mx-auto py-1 px-4 bg-white focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent rounded-lg" type="text" name="email">
            
                <label class="text-center mt-4" for="password">Mot de passe</label>
                <input class="w-2/3 mx-auto py-1 px-4 focus:outline-none focus:ring focus:border-blue-300 rounded-lg" type="password" name="password">
                
                <label class="text-center mt-4" for="password">Confirmation mot de passe</label>
                <input class="mb-4 w-2/3 mx-auto py-1 px-4 focus:outline-none focus:ring focus:border-blue-300 rounded-lg" type="password" name="password_confirmation">

                <input class="my-4 w-2/3 mx-auto bg-red-500 text-white p-2 rounded-lg" type="submit" value="Inscription">
            </form>
        </div>
    </div>
</body>
</html>