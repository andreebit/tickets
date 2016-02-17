@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <h2>Carrito</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Entrada</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>&nbsp;</th>
                </tr>                
            </thead>
            <tbody>
                @foreach($carts as $cart)
                <tr>
                    <td>{{ $cart->price->description}} - {{ $cart->price->event->name }}</td>
                    <td>$ {{ $cart->price->value }}</td>
                    <td>{{ $cart->quantity }}</td>
                    <td><a href="{{ route('cart.delete', ['cart_id' => $cart->id]) }}">Eliminar</a></td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="3">&nbsp;</td>
                    <td><a class="btn btn-success" href="{{ route('checkout.index') }}">Pagar</a></td>
                </tr>                
            </tbody>
        </table>
    </div>
</div>

@stop