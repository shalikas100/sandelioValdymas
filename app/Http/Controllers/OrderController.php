<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\Client;
use App\Product;

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

        $request->validate([
            'product_id' => 'required|integer',
            'kiekis' => 'required|integer|gt:0',
        ]);

        $orderDetail = new OrderDetail;

        $orderDetail -> details_id = $request -> details_id;
        $orderDetail -> product_id = $request -> product_id;
        $orderDetail -> kiekis= $request -> kiekis;
        
        if($orderDetail -> kiekis > $orderDetail -> orderDetailProducts -> likutis){
            return back()
            ->with('danger_message', 
            'Prekės, kodu: "'.$orderDetail -> orderDetailProducts -> kodas.'" 
            kiekis nepakankamas. Likutis sandėlyje "'.$orderDetail -> orderDetailProducts -> likutis.'".');
        }
        
        $orderDetail->save();

        Product::find($request -> product_id) -> decrement('likutis', $request->kiekis);
        
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
        $request->validate([
            'client_id' => 'required|integer',
            'pristatymo_budas' => 'required',
        ]);

        $order = new Order();

        $order -> client_id = $request -> client_id;
        $order -> pristatymo_budas = $request -> pristatymo_budas;

        $order -> save();

        return redirect()->route('orders.index')->with('success_message', 'Naujo pardavimo Nr. '.$order -> id.'. Pildyti');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $allProducts = Product::all();
        return view('orders.show', ['order' => $order, 'allProducts' => $allProducts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $clients = Client::all();
        return view('orders.edit', ['order' => $order, 'clients' => $clients]);
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
        $request->validate([
            'client_id' => 'required|integer',
            'pristatymo_budas' => 'required',
        ]);
        
        
        $order -> client_id = $request -> client_id;
        $order -> pristatymo_budas = $request -> pristatymo_budas;

        $order -> save();

        return redirect()->route('orders.index')->with('success_message', 'Pardavimo Nr. '.$order -> id.' duomenys pakeisti');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {

        $orderDetail_count=$order->orderOrderDetails->count();

        if ($orderDetail_count>0) {
            return redirect()->route('orders.index')->with('danger_message', 'Negalima ištrinti pardavimo "'.$order -> id.'", nes jis turi prekių');
        }

        $order->delete();

        return redirect()->route('orders.index')->with('success_message', 'Pardavimas Nr. "'.$order -> id.'" ištrintas');
        // $order -> delete();

        // Product::find($order -> orderOrderDetails) -> increment('likutis', $order -> orderOrderDetails -> kiekis);
        
        // return redirect()->route('orders.index')->with('danger_message', 'Pardavimas Nr. "'.$order -> id.'" ištrintas');
        
    
    }
}
