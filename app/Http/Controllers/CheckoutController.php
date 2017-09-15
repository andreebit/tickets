<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{

    public function index()
    {
        $carts = \App\Cart::whereUserId($this->user()->id)->get();
        if (!count($carts)) {
            return redirect(route('home.index'));
        }
        return view('site.checkout.index', compact('carts'));
    }

    public function complete(Request $request)
    {

        $carts = \App\Cart::whereUserId($this->user()->id)->get();
        if (!count($carts)) {
            return redirect(route('home.index'));
        }

        $payuResponse = "";
        $order = new \App\Order();
        $order->user_id = $this->user()->id;
        $order->date_time = date('Y-m-d H:i:s');
        $order->save();
        
        try {

            //documentación
            //http://developers.payulatam.com/es/api/sandbox.html
            //https://github.com/mauricio067/integracion-payu-php


            require_once '../resources/libs/payu/PayU.php';

            //URL de Pagos
            \Environment::setPaymentsCustomUrl("https://sandbox.api.payulatam.com/payments-api/4.0/service.cgi");


            \PayU::$apiKey = "6u39nqhq8ftd0hlvnjfs66eh8c";
            \PayU::$apiLogin = "11959c415b33d0c";
            \PayU::$merchantId = "500238";
            \PayU::$language = \SupportedLanguages::ES;
            \PayU::$isTest = true;


            //Parámetros básicos de pago
            $prefix = (env('APP_ENV') == 'production') ? 'PED' : 'TEST';
            $parameters = array(
                \PayUParameters::REFERENCE_CODE => $prefix . str_pad($order->id, 10, '0', STR_PAD_LEFT),
                \PayUParameters::COUNTRY => \PayUCountries::PE,
                \PayUParameters::ACCOUNT_ID => "500546",
                \PayUParameters::CURRENCY => "USD",
                \PayUParameters::DESCRIPTION => $this->user()->cart_description,
                \PayUParameters::VALUE => $this->user()->total_cart_amount,
            );


            //Datos tarjeta de crédito
            $parameters[\PayUParameters::INSTALLMENTS_NUMBER] = 1; //Número de cuotas
            $parameters[\PayUParameters::PAYER_NAME] = $request->get('name', ''); //$this->user()->name;
            $parameters[\PayUParameters::CREDIT_CARD_NUMBER] = $request->get('number', '');
            $parameters[\PayUParameters::CREDIT_CARD_EXPIRATION_DATE] = $request->get('expiration', '');
            $parameters[\PayUParameters::CREDIT_CARD_SECURITY_CODE] = $request->get('cvv', '');
            $parameters[\PayUParameters::PROCESS_WITHOUT_CVV2] = false;
            $parameters[\PayUParameters::PAYMENT_METHOD] = 'VISA';

            $payuResponse = \PayUPayments::doAuthorizationAndCapture($parameters);
            if (isset($payuResponse->code) && $payuResponse->code == 'SUCCESS') {
                if (isset($payuResponse->transactionResponse->state) && $payuResponse->transactionResponse->state == 'APPROVED') {
                    if ($this->generateTickets($order, $payuResponse)) {                        
                       \Mail::queue('email.order', ['order' => $order], function ($message) use($order) {
                            $message->to($order->user->email);
                        });
                        return redirect(route('user.orders'));
                    }
                } else {
                    $order->data = json_encode($payuResponse);
                    $order->status = 'error';
                    $order->save();
                    return redirect(route('checkout.error'))->with('order', $order);
                }
            } else {
                $order->data = json_encode($payuResponse);
                $order->status = 'error';
                $order->save();
                return redirect(route('checkout.error'))->with('order', $order);
            }
        } catch (\Exception $ex) {
            $order->data = $ex->getMessage();
            $order->status = 'error';
            $order->save();
            return redirect(route('checkout.error'))->with('order', $order);
        }
    }

    private function generateTickets(\App\Order $order, $payuResponse)
    {
        $order->data = json_encode($payuResponse);
        $order->status = 'success';
        $order->save();

        $carts = $this->user()->carts()->get();
        foreach ($carts as $cart) {
            $ticket = new \App\Ticket();
            $ticket->order_id = $order->id;
            $ticket->event_id = $cart->price->event->id;
            $ticket->price = $cart->price->value;
            $ticket->description = $cart->price->description;
            $ticket->quantity = $cart->quantity;
            $ticket->unique = ('871fd7278c6b07b7a9777c42ab3a1a55' . md5($order->id) . md5($cart->price->event->id) . md5($cart->price->id));
            $ticket->save();

            \QrCode::format('png')->size(250)->generate($ticket->unique, public_path('qrcodes/' . $ticket->unique . '.png'));
        }
        $this->user()->carts()->delete();

        return true;
    }

    public function error(Request $request)
    {
        $order = $request->session()->get('order', null);
        if (!is_null($order)) {
            return view('site.checkout.error', ['order' => $order]);
        } else {
            return redirect(route('home.index'));
        }
    }

}
