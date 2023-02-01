<?php

namespace App\Http\Controllers;

use App\InvoiceDetail;
use Illuminate\Http\Request;
use App\Product;

class InvoiceDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InvoiceDetail  $invoiceDetail
     * @return \Illuminate\Http\Response
     */
    public function show(InvoiceDetail $invoiceDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InvoiceDetail  $invoiceDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(InvoiceDetail $invoiceDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InvoiceDetail  $invoiceDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InvoiceDetail $invoiceDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InvoiceDetail  $invoiceDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvoiceDetail $invoiceDetail)
    {
        $invoiceDetailProductsQty = $invoiceDetail -> invoiceDetailProducts -> likutis;

        if ($invoiceDetailProductsQty < $invoiceDetail -> inv_kiekis) {
            return redirect()->back()->with('danger_message', 'Negalima ištrinti pajamavimo prekės "'.$invoiceDetail -> invoiceDetailProducts ->kodas.'", nes prekė yra parduota');
        }

        $invoiceDetail -> delete();

        Product::find($invoiceDetail -> inv_product_id) -> decrement('likutis', $invoiceDetail -> inv_kiekis);


        return redirect()->back()->with('success_message', 'Pajamavimo prekė "'.$invoiceDetail -> invoiceDetailProducts ->kodas.'", ištrinta');
    }
}
