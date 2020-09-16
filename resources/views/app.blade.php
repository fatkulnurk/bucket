<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <style media="all">
            .is-dashed {
                border: 2px dashed grey;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
            <div class="container">
                <a class="navbar-brand text-uppercase font-weight-bold" href="{{ route('index') }}">
                    <span class="text-primary">
                        <svg class="icon line" width="38" height="38" id="signal" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M13,9.36a1,1,0,1,1-1-1A1,1,0,0,1,13,9.36ZM12,21V10.36" style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path><path d="M15.54,5.83a5,5,0,0,1,0,7.07M8.46,5.83a5,5,0,0,0,0,7.07m9.9,2.83A9,9,0,0,0,18.36,3M5.64,3a9,9,0,0,0,0,12.73" style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path></svg>
                    </span>
                    Bucket
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active mr-0">
                            <a class="nav-link" href="{{ route('index') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="nav-link" href="">Pricing</a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="nav-link" href="">Torrent Seedbox</a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="nav-link" href="">Torrent Downloader</a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="nav-link" href="{{ route('file-explorer') }}">Explorer</a>
                        </li>
                    </ul>
                    <div class="form-inline my-2 my-lg-0">
                        <a href="{{ route('login') }}" type="button" class="btn btn-primary">Login</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
        @inertia

    <footer class="border-top pt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md">
                    <span class="d-block mb-3 text-muted">&copy; 2020 - {{ config('app.name') }}</span>
                </div>
                <div class="col-6 col-md">
                    <h5>Products</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="#">Cloud Drive</a></li>
                        <li><a class="text-muted" href="#">Torrent Seedbox</a></li>
                        <li><a class="text-muted" href="#">Torrent Downloader</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>Community</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="#">Torrent Finder</a></li>
                        <li><a class="text-muted" href="#">Freenet Groups</a></li>
                        <li><a class="text-muted" href="#">Developer Api</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>About</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="#">Team</a></li>
                        <li><a class="text-muted" href="#">Locations</a></li>
                        <li><a class="text-muted" href="#">Privacy</a></li>
                        <li><a class="text-muted" href="#">Terms</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>Language</h5>
                    <div class="form-group">
                        <select class="form-control">
                            <option disabled>Select Language</option>
                            <option value="en_US" selected>English</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>
