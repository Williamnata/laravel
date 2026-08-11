<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    @vite(['resources/css/app.css'])
</head>

<body>
        <header>

                <nav>
                    <a class="" aria-current="page" href="/">Calcule o IMC <br></a>
                    <a class="" aria-current="page" href="/dashboard">Dashboard</a>

                </nav>
        </header>        

  
    {{$slot}}
    
    <br><br><br>

</body>
</html>