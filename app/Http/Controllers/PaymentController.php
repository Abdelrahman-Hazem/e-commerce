<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function form(Order $order)
    {
        return view('frontend.pages.payment',[
            'order' =>$order ,
        ]);
    }

    public function callback()
    {
        # code...
    }
}
