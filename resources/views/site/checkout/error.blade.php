@extends('layout')

@section('content')
<div class="container">
    <div class="row" style="margin-top: 50px">
        <div class="col-xs-12 col-xs-offset-0 col-sm-8 col-sm-offset-2" style="text-align: center">
            Ocurrió un error al procesar el pago.
        </div>
    </div>
    <div class="row" style="margin-top: 20px">
        <div class="col-xs-12 col-xs-offset-0 col-sm-8 col-sm-offset-2" style="text-align: center">
            {{ $order->data }}
        </div>
    </div>
    <div class="row" style="margin-top: 30px">
        <div class="col-xs-12 col-xs-offset-0 col-sm-8 col-sm-offset-2" style="text-align: center">
            <a href="{{ route('cart.index') }}" class="btn btn-default">Intetar otra vez</a>
        </div>
    </div>    
</div>

@stop