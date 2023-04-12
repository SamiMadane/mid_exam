<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    Public function show(){
        $orders = Order::all();
        return view('all_orders',compact('orders'))->with('status',0);
    }

    Public function store(Request $request){
        //$validatedData = $request->validated();
        $order=new Order(); 
        $order -> Name = $request -> name;
        $order -> Email = $request -> email;
        $order -> Phone = $request -> phone;
        $order -> Address = $request -> address;
        $order -> Product = $request -> product;
        $order -> Quantity = $request -> quantity;
        $order -> Date = $request -> delivery;

        $order->save();
        return view('layout.dashboard')->with('status',0);
    }

    public function destroy ($id){
        Order:: where ('id',$id)->delete();
        return redirect() -> back()->with('status',0);
    }

    public function changeState ($id){
        $status = 1;
        $selectedOrder = Order::where ('id',$id)->get();
        $orders = Order::all();
        return view('create_order',compact(['status','selectedOrder','orders']));
    }

    public function update ($id , Request $request){
        //$validatedData = $request->validated();
        Order::where('id',$id)->update([
            'Name'=> $request->name,
            'Email'=> $request->email,
            'Phone'=> $request->phone,
            'Address'=> $request->address,
            'Product'=> $request->product,
            'Quantity'=> $request->quantity,
            'Date'=> $request->delivery,
        ]);
        $status = 0;
        $orders = Order::all();
        return view('all_orders',compact(['status','orders']));
    }
}
