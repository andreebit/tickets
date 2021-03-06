<!DOCTYPE html>
<html>
    <head>
        <title>Ticketland</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('assets/css/all.css') }}" type="text/css">
    </head>
    <body>
        <div id="wrapper">
            <header>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-7 col-lg-8">
                            <a href="/">
                                <h2>Ticketland</h2>
                                <h5>Compra y disfruta</h5>
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-4 login-link-cntr">
                            @if(!is_null($user))
                                <div class="dropdown login-link" style="width: 100%">
                                    <button class="btn btn-default dropdown-toggle col-xs-12" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        {{ $user->name }} ( {{ $user->total_cart_items }} )
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <li class="col-xs-12 col-sm-8" style="width: 100%"><a href="{{ route('cart.index') }}">Carrito ( {{ $user->total_cart_items }} items )</a></li>
                                        <li role="separator" class="divider col-xs-12 col-sm-8" style="width: 100%"></li>
                                        <li class="col-xs-12 col-sm-8" style="width: 100%"><a href="{{ route('user.orders') }}">Mis compras</a></li>
                                        <li role="separator" class="divider col-xs-12 col-sm-8" style="width: 100%"></li>
                                        <li class="col-xs-12 col-sm-8" style="width: 100%"><a href="{{ route('user.logout') }}">Salir</a></li>
                                    </ul>
                                </div>
                            @else
                                <div>
                                    <a href="{{ route('user.register') }}" class="login-link btn btn-default col-xs-6" >Registro</a>
                                    <a href="{{ route('user.login') }}" class="login-link btn btn-warning col-xs-6">Iniciar Sesión</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </header>
            @yield('content')
        </div>
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="{{ asset('assets/js/all.js') }}" type="text/javascript"></script>
    </body>
</html>