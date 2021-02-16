<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
    </head>
    <body class="antialiased">
        <h1>Api para videos</h1>
        <h4>Desarrollado por:</h4>
        <h5>-Neider Ortiz <br>
            -Sergio Gómez
        </h5>
        <h4>Instrucciones de uso para API REST </h4>
        <p><strong>Auth - Login </strong><br>

            POST /api/login <br>
            { <br>
                "email": "",    =>REQUERIDO <br>
                "password": ""  =>REQUERIDO <br>
            }<br><br>

            POST /api/register <br>
            { <br>
                "name": "",     =>REQUERIDO <br>
                "email": "",    =>REQUERIDO <br>
                "password": ""  =>REQUERIDO <br>
            }<br><br>

            POST /api/userupdate <br>
            { <br>
                "name": "",     =>REQUERIDO <br>
                "email": "",    =>REQUERIDO <br>
                "password": ""  =>REQUERIDO <br>
            }<br><br>

            POST /api/logout <br>
            { <br>
                "name": "",     =>REQUERIDO <br>
                "email": "",    =>REQUERIDO <br>
                "password": ""  =>REQUERIDO <br>
            }<br><br>

            <strong>Videos</strong><br><br>
            GET /api/clips<br>
            GET /api/clips/$id<br><br>

            POST /api/create<br>
            {
                "clip": "",     =>REQUERIDO <br>
                "nombre": "",    =>REQUERIDO <br>
                "descripcion": ""  =>REQUERIDO <br>
            }<br><br>

            POST /api/delete<br>
            {<br>
                "clip": "",     =>REQUERIDO <br>
                "nombre": "",    =>REQUERIDO <br>
                "descripcion": ""  =>REQUERIDO <br>
            }<br><br>

            POST /api/update<br>
            {<br>
                "clip": "",     =>REQUERIDO <br>
                "nombre": "",    =>REQUERIDO <br>
                "descripcion": ""  =>REQUERIDO <br>
            }<br><br>

        </p>
    </body>
</html>
