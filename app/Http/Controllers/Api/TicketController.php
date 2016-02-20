<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Order;

class TicketController extends Controller
{

    public function index(Request $request)
    {
        $orderId = $request->get('order_id', '');

        if (empty($orderId)) {
            return response()->json(['status' => 'error', 'message' => 'order_id necesario']);
        }

        $order = Order::find($orderId);

        if (!is_null($order)) {
            $tickets = $order->tickets()->get();
            $data = [];
            foreach ($tickets as $ticket) {
                $data[] = [
                    'id' => $ticket->id,
                    'event' => $ticket->event->name,
                    'description' => $ticket->description,
                    'price' => $ticket->price,
                    'quantity' => $ticket->quantity,
                    'qr' => asset('qrcodes/' . $ticket->unique . '.png'),
                    'status' => $ticket->status
                ];
            }

            return response()->json(['status' => 'success', 'message' => '', 'data' => $data]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'no se encontró pedido con el id especificado']);
        }
    }

    public function check(Request $request)
    {
        $code = $request->get('code', '');

        $ticket = \App\Ticket::whereUnique($code)->first();

        if (!is_null($ticket)) {
            if ($ticket->status == "enabled") {
                $ticket->status = "disabled";
                $ticket->save();
                return response()->json(["status" => "success", "message" => "", "data" => ["event" => $ticket->event->name, "description" => $ticket->description, "quantity" => $ticket->quantity]]);
            } else {
                return response()->json(["status" => "error", "message" => "Ticket ya fue utilizado."]);
            }
        } else {
            return response()->json(["status" => "error", "message" => "Código incorrecto."]);
        }
    }

}
