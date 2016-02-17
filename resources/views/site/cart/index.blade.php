@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <table class="table">
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
                    <td>{{ $cart->price->description}} para {{ $cart->price->event->name }}</td>
                    <td>$ {{ $cart->price->value }}</td>
                    <td>{{ $cart->quantity }}</td>
                    <td><a href="{{ route('cart.delete', ['cart_id' => $cart->id]) }}">Eliminar</a></td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="4"><a class="btn btn-success" href="#">Pagar</a></td>
                </tr>                
            </tbody>
        </table>
    </div>
</div>

@stop