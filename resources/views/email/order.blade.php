<!DOCTYPE html>
<html>
    <head>
        <title>Ticketland</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">        
    </head>
    <body>
        <h1>Ticketland</h1>
        <hr>
        <h2 style="text-align: center;">Su pedido ha sido realizado con éxito</h2>
        <table>
            <tr>
                <th style="text-align: left; border-bottom: 1px solid #cccccc"># de Pedido</th>
                <td style="border-bottom: 1px solid #cccccc">{{ $order->number }}</td>
            </tr>
            <tr>
                <td colspan="2">
                    <h3>Tickets:</h3>
                    <table>
                        <thead>
                            <tr>
                                <th style="border: 1px solid #cccccc">Evento</th>
                                <th style="border: 1px solid #cccccc">Tipo</th>
                                <th style="border: 1px solid #cccccc">Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->tickets as $ticket)
                            <tr>
                                <td style="border: 1px solid #cccccc">{{ $ticket->event->name }}</td>
                                <td style="border: 1px solid #cccccc">{{ $ticket->description }}</td>
                                <td style="border: 1px solid #cccccc">{{ $ticket->quantity }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>