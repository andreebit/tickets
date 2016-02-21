<!DOCTYPE html>
<html>
    <head>
        <title>Tickets</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">        
    </head>
    <body>
        <h2 style="text-align: center;">Su pedido ha sido realizado con éxito</h2>
        <table>
            <tr>
                <th>
                    # de Pedido
                </th>
                <td>
                    {{ $order->number }}
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <h3>Tickets</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Evento</th>
                                <th>Tipo</th>
                                <th>Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->tickets as $ticket)
                            <tr>
                                <th>{{ $ticket->event->name }}</th>
                                <th>{{ $ticket->description }}</th>
                                <th>{{ $ticket->quantity }}</th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>