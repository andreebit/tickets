<!DOCTYPE html>
<html>
    <head>
        <title>Tickets</title>
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
                        <div class="col-xs-12 col-sm-9">
                            <a href="/">
                                <h2>Pase Libre</h2>
                                <h5>Compra y disfruta</h5>
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-3 login-link-cntr">
                            @if(!is_null($user))
                                <a href="{{ route('user.logout') }}" class="login-link btn btn-default col-xs-12 col-sm-8">{{ $user->name }}</a>
                            @else
                                <a href="{{ route('user.autologin') }}" class="login-link btn btn-default col-xs-12 col-sm-8">Acceder</a>
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