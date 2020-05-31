<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Cart;
use App\Order;
use Auth;

class OrderController extends Controller
{
    //

    public function index(){

        $orders = Order::with('product','user')->paginate(3);

       return view('order.all-order',compact('orders'));
    }

    public function store(Request $request){

//dd($request);

        request()->validate([
           // 'product_id' => 'required',
            // 'shipment' => 'required',
            'phone_number'  => 'required',
            'shipping_address' => 'required',
            'country'  => 'required',
            'city' => 'required',
             'zip' => 'required',

        ]);
        $cartCollection = Cart::getContent();

        $str1 = 'BT';
        $trackPrefix = ucfirst($str1);
        $mtRand  = mt_rand(10000, 99999);
        $getTrackingId   = $trackPrefix .(- $mtRand);

    foreach($cartCollection as $product){

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->user_email = Auth::user()->email;
        $order->product_id = $product->id;
        $order->quantity = $product->quantity;
        $order->amount   = $product->price *$product->quantity;
        $order->phone_number = $request->input('phone_number');
        $order->shipping_address = $request->input('shipping_address');
        $order->country = $request->input('country');
        $order->city = $request->input('city');
        $order->tracking_number  = $getTrackingId;
        $order->zip  = $request->input('zip');
        if($request->input('cash')== "on"){
            $order->payment_method   =  'cash';
        }else{
            $order->payment_method   = 'card';
        }

        $order->save();

        //after product order has been sent successfuly clear cart
        Cart::clear();


        alert()->success('Product order sent successfully', 'Success')->autoclose(5000);

        return redirect('/');


    }


    }

    public function processing($order){

        Order::where('id',$order)->update([
            'status'=> 2,
        ]);

        alert()->success('Order Status updated successfully', 'Success')->autoclose(5000);

        return back();

    }
    public function shipped($order){

        Order::where('id',$order)->update([
            'status'=> 3,
        ]);

        alert()->success('Order Status updated successfully', 'Success')->autoclose(5000);

        return back();
    }
    public function delivered($order){

        Order::where('id',$order)->update([
            'status'=> 4,
        ]);

        alert()->success('Order Status updated successfully', 'Success')->autoclose(5000);

        return back();

    }
    public function cancel($order){

        Order::where('id',$order)->update([
            'status'=> 0,
        ]);

        alert()->success('Order Status updated successfully', 'Success')->autoclose(5000);

        return back();

    }
}
