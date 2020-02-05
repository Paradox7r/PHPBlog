<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Блог о веб-разработке</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">




        <!-- Styles -->
        <style>

        .scroll-x {
          overflow-x: auto;
        }
        
        .container {
          margin-bottom: 10px;
          text-align: right;
        }

        .container a {
          font-family: Helvetia, sans-serif;
        }


            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                padding: 0;
                font-size: 17px;

            }

            code {
              display: inline-block;
              background-color: black;
              padding-top: 1%;
              padding-bottom:1%;
              padding-left:1%;
              color: yellow;
              width: 100%;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 3%;
                top: 10px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .center {
              margin-left: auto;
              margin-right: auto;
              width: 18em
            }

            .weight {
              weight: 100%;
            }


            .content1 {
              min-height: 85vh;
            }

            .center-img {
              display: block;
              margin-left: auto;
              margin-right: auto;
            }

            .menu {
              position: fixed; /* Фиксированное положение */
              right: 10px; /* Расстояние от правого края окна браузера */
              top: 20%; /* Расстояние сверху */
              padding: 10px; /* Поля вокруг текста */
              background: #ffe; /* Цвет фона */
              border: 1px solid #333; /* Параметры рамки */
            }

            </style>
            </head>

            <body>
     <div class="main>">

     <nav class="navbar sticky-top navbar-dark bg-dark shadow-sm rounded" >

         <a class="navbar-brand text-light"  href="{{route('articles.index')}}"> PHP Blog </a>

         @if (Route::has('login'))
             <div class="links">
                 @auth



                 <div class="btn-group">
                   <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     {{ Auth::user()->name }}
                   </button>
                   <div class="dropdown-menu dropdown-menu-right">

                     @if(Auth::user()->role == 1)
                     <a class="dropdown-item" href="{{route('admin.dashboard')}}">Администрирование</a>
                     @endif
                       <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                         {{ __('Выйти') }}
                       </a>
                   </div>
                 </div>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                               @csrf
                 </form>






       <!--<div class="float-left">    <a href="{{ url('/home') }}"><button type="button" class="btn btn-primary">Профиль</button></a></div> -->
                 <!--  href="{{ url('/home') }}" -->
                 @else
                     <div class="float-left mr-3"><a href="{{ route('login') }}"><button type="button" class="btn btn-primary">Войти</button></a></div>

                     @if (Route::has('register'))
                         <div class="float-left"><a href="{{ route('register') }}"><button type="button" class="btn btn-primary">Регистрация</button></a></div>
                     @endif
                 @endauth
             </div>
         @endif

     </nav>


     @yield('content')

     <nav class="navbar bottom navbar-dark bg-dark  mt-4 pl-5 text-center" style="text-align: center;">
       <div class="text-light text-center py-1 " ><small>© 2020 PHP Blog.RU</small></div>
     </nav>





</div>




<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
