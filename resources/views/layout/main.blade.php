<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
        <link rel="stylesheet" href="{{ asset('styles/bootstrap.min.css') }}"> 
        <!-- <link rel="stylesheet" href="../../public/styles/responsive.css"> -->
        <link rel="stylesheet" href="{{ asset('styles/style.css') }}">

        <title>@yield('title')</title>
     
    </head>

    <body>
        <header>
            <nav
                class="navbar navbar-expand-lg navbar-dark bg-info">
                <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item {{request()->is('/') ? 'active' : ''}}">
                            <a class="nav-link" href="{{ url('/') }}">Home
                                <!-- <span class="sr-only">(current)</span> -->
                            </a>
                        </li>
                        <li class="nav-item {{request()->is('skripsi') ? 'active' : ''}}">
                            <a class="nav-link" href="{{ url('/skripsi') }}">Skripsi</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">Jurnal</a>
                        </li> -->
                        <li class="nav-item {{request()->is('aplikasi') ? 'active' : ''}}">
                            <a class="nav-link" href="{{ url('/aplikasi') }}">Aplikasi</a>
                        </li>
                    </ul>
                </div>
            </nav>     
        </header>

        @yield('main')
        <!-- ./Content -->
        <!-- Footer -->
        <footer
            class="bg-info">
            <!-- <div class="container-fluid text-center py-3 bg-primary"> -->
            <div class="container text-white text-center">
                Copyright@ilham76c 2020
            </div>
        </footer>
        <!-- Footer -->
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"> </script> -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
        <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        
        @yield("js")
    </body>

</html>
