<?php

namespace App\Http\Controllers;

use App\Http\Services\FatoorahServices;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FatoorahController extends Controller
{
    private $fatoorahServices;
    public function __construct(FatoorahServices $fatoorahServices)
    {
        $this->fatoorahServices = $fatoorahServices;

    }

    public function payOrder()
    {

    $customer_name = Auth::user()->name;
    $customer_email = Auth::user()->email;
    // $InvoiceValue = 
        $data = [
            //Fill required data
            'NotificationOption' => 'Lnk', //'SMS', 'EML', or 'ALL'
            'InvoiceValue'       => '50',
            'CustomerName'       => $customer_name,
            //Fill optional data
            'DisplayCurrencyIso' => 'KWD',
            'CustomerEmail'      => $customer_email,
            'CallBackUrl'        => env('success_url'),
            'ErrorUrl'           => env('error_url'),
            'Language'           => 'en', //or 'ar'      
        ];
        $this->fatoorahServices->sendPayment($data);
    }
}
