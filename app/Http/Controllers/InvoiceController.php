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

    public function create()
    {
        $manufacturers = Manufacturer::all();
        $invoices = Invoice::all();
        return view('invoices.index', ['invoices' => $invoices, 'manufacturers' => $manufacturers]);
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
            'pirkimas_grazinimas' => 'required',
        ]);

        $invoice = new Invoice();

        $invoice -> manufacturer_id = $request -> manufacturer_id;
        $invoice -> pirkimas_grazinimas = $request -> pirkimas_grazinimas;

        $invoice -> save();

        return redirect()->route('invoices.index')->with('success_message', 'Pajamavimas "'.str_pad($invoice -> id, 7, 'PAJ000', STR_PAD_LEFT).'" sukurtas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        $allProducts = Product::all()->where('gamintojas', '=', $invoice -> manufacturer_id);

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
        $request->validate([
            'im_kodas' => 'required', 
        ]);
        

        $invoice -> manufacturer_id = $request -> manufacturer_id;

        $invoice -> save();

        return redirect()->route('invoices.index')->with('success_message', 'Pajamavimo Nr. '.str_pad($invoice -> id, 7, 'PAJ000', STR_PAD_LEFT).' duomenys pakeisti');
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
            return redirect()->route('invoices.index')->with('danger_message', 'Negalima ištrinti pajamavimo Nr. "'.str_pad($invoice -> id, 7, 'PAJ000', STR_PAD_LEFT).'", nes jis turi prekių');
        }

        $invoice->delete();

        return redirect()->route('invoices.index')->with('success_message', 'Pajamavimo Nr. "'.str_pad($invoice -> id, 7, 'PAJ000', STR_PAD_LEFT).'" ištrintas');
    }

    public function searchAjax()
    {
        $search = request() -> query('search');
        $invoices = Invoice::where('manufacturer_id', 'LIKE', "%$search%")->get();

        return response()->json($invoices);
    }
}
