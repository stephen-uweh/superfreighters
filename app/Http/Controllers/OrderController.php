<?php

namespace App\Http\Controllers;

use App\Mail\CustomerMail;
use App\Mail\OrderMail;
use App\Models\Items;
use App\Models\Payment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Unicodeveloper\Paystack\Facades\Paystack;

class OrderController extends Controller
{

    public function create(){
        return view('index');
    }
    public function redirectToGateway(Request $request){
        $air_base_fare = 50000;
        $sea_base_fare = 15000;
        $air_weight = 10000;
        $sea_weight = 2000;
        $us_flat_rate = 1500;
        $uk_flat_rate = 800;
        if($request->mode_of_transport == "Air"){
            $weight = $air_weight * (int)$request->item_weight;
            if($request->country_of_origin == "UK"){
                $total = $air_base_fare + $weight + $uk_flat_rate;
            }
            else{
                $total = $air_base_fare + $weight + $us_flat_rate;
            }
        }
        else{
            $weight = $sea_weight * $request->item_weight;
            if($request->country_of_origin == "UK"){
                $total = $sea_base_fare + $weight + $uk_flat_rate;
            }
            else{
                $total = $sea_base_fare + $weight + $us_flat_rate;
            }
        }
        $order_id = uniqid();
        $order = Items::create([
            'order_id' => $order_id,
            'client_name' => $request->client_name,
            'client_email' => $request->client_email,
            'client_address' => $request->client_address,
            'mode_of_transport' => $request->mode_of_transport,
            'item_name' => $request->item_name,
            'item_weight' => $request->item_weight,
            'country_of_origin' => $request->country_of_origin,
            'total' => $total
        ]);
        $details = array(
            'name' => $order->client_name,
            'order_id' => $order->order_id,
            'total' => $order->total
        );
        $data = array(
            'order_id' => $order_id,
            'client_name' => $order->client_name,
            'client_email' => $order->client_email,
            'client_address' => $order->client_address,
            'mode_of_transport' => $order->mode_of_transport,
            'item_name' => $order->item_name,
            'item_weight' => $order->item_weight,
            'country_of_origin' => $order->country_of_origin,
            'total' => $total
        );
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(Exception $e){
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }
        Mail::to($request->client_email)->send(new CustomerMail($details));
        Mail::to('admin@superfreighters.com')->send(new OrderMail($data));
    }

    public function handleGatewayCallback(){
        $paymentDetails = Paystack::getPaymentData();
        Payment::create([
            'payment_reference' => $paymentDetails->reference
        ]);
        return view('confirmed');
    }
}
