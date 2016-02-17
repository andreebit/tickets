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

    public function complete()
    {
        //documentación
        //http://developers.payulatam.com/es/api/sandbox.html
        //https://github.com/mauricio067/integracion-payu-php


        require_once '../resources/libs/payu/PayU.php';

        //URL de Pagos
        \Environment::setPaymentsCustomUrl("https://stg.api.payulatam.com/payments-api/4.0/service.cgi");


        \PayU::$apiKey = "6u39nqhq8ftd0hlvnjfs66eh8c";
        \PayU::$apiLogin = "11959c415b33d0c";
        \PayU::$merchantId = "500238";
        \PayU::$language = \SupportedLanguages::ES;
        \PayU::$isTest = true;


        //Parámetros básicos de pago
        $parameters = array(
            \PayUParameters::REFERENCE_CODE => rand(1, 100000000),
            \PayUParameters::COUNTRY => \PayUCountries::PE,
            \PayUParameters::ACCOUNT_ID => "500546",
            \PayUParameters::CURRENCY => "USD",
            \PayUParameters::DESCRIPTION => $this->user()->cart_description,
            \PayUParameters::VALUE => $this->user()->total_cart_amount,
        );


        //Datos tarjeta de crédito
        $parameters[\PayUParameters::INSTALLMENTS_NUMBER] = 1; //Número de cuotas
        $parameters[\PayUParameters::PAYER_NAME] = 'APPROVED'; //$this->user()->name;
        $parameters[\PayUParameters::CREDIT_CARD_NUMBER] = '4111111111111111';
        $parameters[\PayUParameters::CREDIT_CARD_EXPIRATION_DATE] = "2018/08";
        $parameters[\PayUParameters::CREDIT_CARD_SECURITY_CODE] = '123';
        $parameters[\PayUParameters::PROCESS_WITHOUT_CVV2] = false;
        $parameters[\PayUParameters::PAYMENT_METHOD] = 'VISA';
        
        $payu_response = \PayUPayments::doAuthorizationAndCapture($parameters);
        
        dd($payu_response);
    }

}
