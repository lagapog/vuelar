<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300,400,600">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <style>
        *{margin: 0; padding: 0}
        .provider-container{
            font-family: Raleway;
            background-color: #ABABD3;
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .provider-login{
            border-radius: 10px;
            box-shadow: 2px 2px 8px 1px rgba(0,0,0,.5), 
                        -2px -2px 8px 1px rgba(0,0,0,.5);
            background-color: white;
            width: 370px;
            height: 300px;
            max-height: 100vh;
            padding-top: 2rem;
            padding-bottom: 2rem;
            display: grid;
            grid-template-rows: 5rem repeat(2, 1fr);
            align-items: center;
            justify-items: center;
        }
        .provider-title{
            color: #47477A;
        }
        .provider-image{
            border-radius: 50%;
        }
        .provider-button {
            font-size: 1rem;
            border-radius: 10px;
            border: none;
            padding: 10px 40px;
            background-color: #47477A;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>
<body>  
    <div class="provider-container">
        <div class="provider-login">
            @if($status == '200')
            <h3 class="provider-title">{{ $user->name }}</h3>
            <img class="provider-image" src="{{ $user->avatar }}" alt="{{ $user->name }}">
            <button class="provider-button" onclick="toLogin()">
                Sí, soy yo.
            </button>
            <input type="hidden" id="token" value="{{ $token }}">
            <input type="hidden" id="user" value="{{ $user }}">
            @else
                <div class="provider-alert">
                    Hubo problemas al realizar el inicio de sesión.
                    Inténtelo nuevamente.
                </div>
            @endif
        </div>
    </div>
    <script>
        function toLogin() {
            let inputToken = document.getElementById('token')
            let inputUser = document.getElementById('user')
            let token = inputToken.value
            let user = inputUser.value
            window.localStorage.setItem('token', token)
            window.localStorage.setItem('user', user)
            // axios.defaults.headers.common['Authorization'] = 'Bearer ' + token
            window.location.replace('http://localhost:8000/')
        }
    </script>
</body>
</html>