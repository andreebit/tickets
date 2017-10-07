@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-push-3">
                <h2>Registro</h2>
                @if(session()->has('error_register'))
                <p style="color: red; margin: 20px 0px">Ocurrió un error en el registro</p>
                @endif
                <form action="" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input name="name" type="text" class="form-control" placeholder="Nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input name="email" type="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Contraseña</label>
                        <input name="password" type="password" class="form-control" placeholder="Contraseña" required>
                    </div>
                    <button type="submit" class="btn btn-success">Registrarse</button>
                </form>
            </div>
        </div>
    </div>

@stop