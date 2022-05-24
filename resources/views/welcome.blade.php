<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Teachzy</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
               
            }
            .bg {
                background-image: url('images/wel.jpg');
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;

            }

        </style>
    </head>
    <body >
    <div class = "bg" style = "height :630px">

        <div class="h-100 row align-items-center" style = "margin:0">
            <div class="card text-center" style="margin-top: 60px; padding:0; background-color:transparent; border:none;">
                <div class = "row">
                        <div class = "col-4">
                        </div>
                        <div class = "col">
                            <a href="{{ route('login') }}" class="btn btn-success" style = "margin-right:20px">Login</a>
                            <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
    


<!--     
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-success">Log in</a>

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-primary" >Register</a>
                        @endif
                    @endauth
                </div>
            @endif -->
    </body> 
         

</html>
