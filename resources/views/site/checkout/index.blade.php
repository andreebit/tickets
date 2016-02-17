@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h2>Checkout</h2>
            <table class="table table-striped" style="margin-top: 20px">
                <thead>
                    <tr>
                        <th>Entrada</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                    </tr>                
                </thead>
                <tbody>
                    @foreach($carts as $cart)
                    <tr>
                        <td>{{ $cart->price->description}} - {{ $cart->price->event->name }}</td>
                        <td>$ {{ $cart->price->value }}</td>
                        <td>{{ $cart->quantity }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="2">Total</td>
                        <td>{{ $user->total_cart_amount }}</td>
                    </tr>                                
                    <tr>
                        <td colspan="2">&nbsp;</td>
                        <td><a class="btn btn-success" href="{{ route('checkout.complete') }}">Completar Pago</a></td>
                    </tr>                
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop