<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ESF-FDD</title>

        <!-- Fonts -->
				<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- CSS  -->
				<link href="<?=asset('dist/css/all.min.css')?>" media="all" rel="stylesheet" type="text/css"/>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
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
                right: 10px;
                top: 18px;
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
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
			<!--  -->
			<!-- header -->
  <div class="navbar navbar-expand-lg navbar-light sticky-top header-bg" style="background-color: rgba(125, 0, 47, 1);">
    <nav class="container" style="width: 100%;">
      <a class="navbar-brand col-3 text-r-2-3-2 white" href="https://www.esf.edu.hk" target="_blank">
        <!-- <img src="./assets/img/hks-logo.svg" alt=""> -->
        <img class="elevation-3" style="width:50px;" src="http://esf-ffd.vela.hk/dist/img/logo.png" alt="">
        <span class="ml-2"><b class="text-r-2-5-2">ESF</b>FDD</span>
      </a>
      <div class="">
        <!-- <a class="white mr-2" href="http://esf-ffd.vela.hk/login">Login</a>
				<a class="white" href="http://esf-ffd.vela.hk/register">Register</a> -->
							<!--  -->
							<!-- <div class="flex-center position-ref full-height"> -->
            @if (Route::has('login'))
                <!-- <div class="top-right links"> -->
                    @auth
                        <a class="white" href="{{ url('/home') }}">Home</a>
                    @else
                        <a class="white mr-2" href="{{ route('login') }}">Login</a>
                        <a class="white" href="{{ route('register') }}">Register</a>
                    @endauth
                <!-- </div> -->
						@endif
						<!--  -->
      </div>
    </nav>
  </div>
  <!-- header -->
  <div class=" ">
    <div>
      <img style="object-fit: cover;width: 100%;height: 100vh; opacity: 0.6;" src="http://esf-ffd.vela.hk/dist/img/img-welcome.jpg" alt="img">
    </div>
  </div>

            <!-- <div class="content">
                <div class="title m-b-md">
                    ESF FDD
                </div> -->

<!--                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>-->
            </div>
        </div>
  <!-- footer -->
  <footer class="fixed-bottom" style="opacity: 0.8; background-color: rgba(125, 0, 47, 1);">
    <div class="container white pt-2 pb-2">
      <div class="float-right d-none d-sm-block">
        Version 1.0
      </div>
      Copyright © 2020 <a href="/" class="white">English Schools Foundation</a>. All rights
      reserved.
    </div>
  </footer>
  <!-- footer -->
    </body>
</html>
