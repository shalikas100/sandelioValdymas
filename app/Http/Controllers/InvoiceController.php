<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Manufacturer;
use App\Product;
use App\InvoiceDetail;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $manufacturers = Manufacturer::all();
        $invoices = Invoice::all();

        return view('invoices.index', ['manufacturers' => $manufacturers, 'invoices' => $invoices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $manufacturers = Manufacturer::all();
        $invoices = Invoice::all();
        return view('invoices.index', ['invoices' => $invoices, 'manufacturers' => $manufacturers]);
    }

    public function createProducts()
    {
        $invoiceDetails = invoiceDetail::all();
        return view('invoices.show',['invoiceDetails' => $invoiceDetails]);
    }

    public function storeProducts(Request $request)
    {

        $request->validate([
            'inv_product_id' => 'required|integer',
            'inv_kiekis' => 'required|integer|gt:0',
        ]);

        $invoiceDetail = new InvoiceDetail();

        $invoiceDetail -> inv_details_id = $request -> inv_details_id;
        $invoiceDetail -> inv_product_id = $request -> inv_product_id;
        $invoiceDetail -> inv_kiekis= $request -> inv_kiekis;
        
        $invoiceDetail->save();

        Product::find($request -> inv_product_id) -> increment('likutis', $request->inv_kiekis);
        
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
        $request -> validate([
            'manufacturer_id' => 'required|integer',
        ]);

        $invoice = new Invoice();

        $invoice -> manufacturer_id = $request -> manufacturer_id;

        $invoice -> save();

        return redirect()->route('invoices.index')->with('success_message', 'Pajamavimas sukurtas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        $allProducts = Product::all();
        return view('invoices.show', ['invoice' => $invoice, 'allProducts' => $allProducts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        $manufacturers = Manufacturer::all();
        return view('invoices.edit', ['invoice' => $invoice, 'manufacturers' => $manufacturers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        

        $invoice -> manufacturer_id = $request -> manufacturer_id;

        $invoice -> save();

        return redirect()->route('invoices.index')->with('success_message', 'Pajamavimo Nr. '.$invoice -> id.' duomenys pakeisti');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        $invoiceDetail_count=$invoice->invoiceInvoiceDetails->count();

        if ($invoiceDetail_count>0) {
            return redirect()->route('invoices.index')->with('danger_message', 'Negalima ištrinti pajamavimo Nr. "'.$invoice -> id.'", nes jis turi prekių');
        }

        $invoice->delete();

        return redirect()->route('invoices.index')->with('success_message', 'Pajamavimo Nr. "'.$invoice -> id.'" ištrintas');
    }

    public function searchAjax()
    {

        $search = request() -> query('search');

        $invoices = Invoice::where('manufacturer_id', 'LIKE', "%$search%")->get();

        return response()->json($invoices);
    }
}
