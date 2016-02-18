@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h2>Checkout</h2>
            <table class="table table-striped table-responsive" style="margin-top: 20px">
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
                </tbody>
            </table>
            <form method="post" action="{{ route('checkout.complete') }}" class="col-xs-12 col-xs-offset-0 col-sm-8 col-sm-offset-2">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <table class="table table-responsive">
                    <tbody>
                        <tr>
                            <td colspan="2" style="text-align: center">Datos de la tarjeta</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center">Pagos procesados por Payu Latam</td>
                        </tr>                        
                        <tr>
                            <td>Nombre</td>
                            <td><input type="text" value="APPROVED" name="name" class="col-xs-12"></td>
                        </tr>
                        <tr>
                            <td>Número</td>
                            <td><input type="text" value="4111111111111111" name="number" class="col-xs-12"></td>
                        </tr>
                        <tr>
                            <td>Fecha de vencimiento</td>
                            <td><input type="text" value="2018/08" name="expiration" class="col-xs-12"></td>
                        </tr>                    
                        <tr>
                            <td>CVV</td>
                            <td><input type="text" value="123" name="cvv" class="col-xs-12"></td>
                        </tr> 
                        <tr>
                            <td colspan="2" style="text-align: center">
                                <input type="submit" value="Completar pago" class="btn btn-success">
                            </td>
                        </tr>                        
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>

@stop