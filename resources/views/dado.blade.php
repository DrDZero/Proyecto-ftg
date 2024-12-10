<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <!--SWEETALERT CSS-->
        <link rel="stylesheet" href="../css/sweetalert.css">

        <!-- Main CCS-->
        <link rel="stylesheet" href="../css/main.css">

        <link rel="stylesheet" href="../css/dados.css">

        <title>Dados</title>
    </head>

    <body>
        <!-- Encabezado -->
        <nav class="navbar bg-dark text-white">
            <div class="form-inline">
                <a class="navbar-brand">Dados d6</a>
                <button class="btn btn-success"><a href="{{ route('home') }}">INICIO</a></button>
            </div>
        </nav>
         <!-- Funciones y botones -->
         <div class="container content-main">
            <div class="row justify-content-center text-center">
                <div class="col-12 ">
                    <h3>LANZAMIENTO DE DADOS</h3>                
                </div>
                <div class="col-12">
                    <p>Lanza dados, de momento d6</p>
                </div>
            </div>
            <div class="row justify-content-center text-center my-4">
                <button class="btn btn-success" onclick="lanzardados()">
                    LANZAR DADOS
                </button>
            </div>
            <div class="row">
                <div class="col-6 text-center">
                    <img src="./../img/dados/rand.svg" class="dado" id="ImgDado1">
                </div>
                <div class="col-6 text-center">
                    <img src="./../img/dados/rand.svg" class="dado" id="ImgDado2">
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <div class="card-header my-5">
                        <h5><b>SUMA</b></h5>
                        <button class="btn btn-dark white-text">
                            <h2 id="SumaDados">0</h2>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer o piede pagina -->
        <footer class="page-footer  bg-dark text-white">
            <div class="footer-copyright font-small py-3  text-center"> 
                Cortesia y © 2020 Copyright:
                <a href="https://isf3rjara.blogspot.com/" target="_blank">
                    isf3rjara.blogspot.com
                </a>
            </div>
        </footer>
        <!-- jQuery 3.1.0 -->
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <!-- Boostrap JS-->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!--SWEET ALERT JS-->
        <script src="../js/sweetalert.js"></script>
        {{--@section('js')
            <script src="{{asset('js/sweetalert.js')}}"></script>
        @stop--}}
        <!-- Popurri JS-->
        <script src="../js/main.js"></script>
        <script src="../js/dados.js"></script>
        {{--@section('js')
            <script src="{{asset('js/popurri.js')}}"></script>
        @stop--}}
        <script>
            
        </script>
    </body>
</html>