<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        
    </head>
    <body>
        <nav>
            <ul>
                <li>
                    <a href="{{ route('ruta1')}}">Consultemos acerca del stock de la concesionaria</a>
                </li>
            </ul>
        </nav>
    </body>
</html>
