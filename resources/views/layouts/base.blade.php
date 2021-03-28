<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Simplon Quizz - @yield('title')</title>
        <link rel="stylesheet" type="text/css" href="/sass/app.css" >
        <link rel="shortcut icon" type='./image/png' href="favicon.ico" />
         <!-- kit(mathieu) "font awesome" pour affichage favicon -->
         <script src="https://kit.fontawesome.com/b9bceadb5d.js" crossorigin="anonymous"></script>
    </head>
    <body>
        @include('layouts.header')
        @yield ('content')
        <script src="/js/app.js"></script>
    </body>
</html>