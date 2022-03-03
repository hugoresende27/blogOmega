<DOCTYPE html>
    <html lang=”en-US”>
    <head>
    <meta charset=”utf-8">
    </head>

    <style>
        body{
            background-color: #000;
            color:#fff;
            font-family: 'Consolas', sans-serif;
        }

    </style>
    <body>
    <h2>Omega Blog</h2>
        <p>
            
            This is a Laravel blog project developed by me, thank you for your registration
        
        </p>

        @if (isset($name))

            <p>Name:  {{ $name }}</p>

        @endif
        @if (isset($pass))

            <p>Pass: {{ $pass }}</p>

        @endif
   </body>
   </html>