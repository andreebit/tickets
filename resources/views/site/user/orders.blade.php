@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h2>Mis compras</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th># Pedido</th>
                        <th>Fecha y hora</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->date_time }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Tickets comprados
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Evento</th>
                                        <th>Descripción</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>                        
                                    </tr>
                                </thead>
                                @foreach($order->tickets()->get() as $ticket)
                                <tbody>
                                    <tr>
                                        <td>{{ $ticket->event->name }}</td>
                                        <td>{{ $ticket->description }}</td>
                                        <td>{{ $ticket->price }}</td>
                                        <td>{{ $ticket->quantity }}</td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </td>
                    </tr>                
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop