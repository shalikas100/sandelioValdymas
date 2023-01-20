<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\Client;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        $orders = Order::all();

        return view('orders.index', ['orders' => $orders, 'clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        $orders = Order::all();
        return view('orders.index', ['orders' => $orders, 'clients' => $clients]);
    }




    public function createProducts()
    {
        $orderDetails = OrderDetail::all();
        return view('order.show',['orderDetails' => $orderDetails]);
    }



    public function storeProducts(Request $request)
    {
        $orderDetail = new OrderDetail;

        $orderDetail -> details_id= $request -> details_id;
        $orderDetail -> product_id= $request -> product_id;
        $orderDetail -> kiekis= $request -> kiekis;

        $orderDetail->save();

        return back();

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order();

        $order -> client_id = $request -> client_id;
        $order -> pristatymo_budas = $request -> pristatymo_budas;

        $order -> save();

        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        
        return view('orders.show', ['order' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
