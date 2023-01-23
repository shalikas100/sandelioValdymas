<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();

        $product -> kodas = $request -> kodas;
        $product -> barkodas = $request -> barkodas;
        $product -> pavadinimas = $request -> pavadinimas;
        $product -> likutis = $request -> likutis;
        $product -> svoris = $request -> svoris;
        $product -> vnt_dezeje = $request -> vnt_dezeje;
        $product -> gamintojas = $request -> gamintojas;
        $product -> tipas = $request -> tipas;
        $product -> vieta_sandelyje = $request -> vieta_sandelyje;

        $product->save();

        return redirect()->route('products.index')->with('success_message', 'Prekė, kodu "'.$product -> kodas.'" sukurta sėkmingai');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product -> kodas = $request -> kodas;
        $product -> barkodas = $request -> barkodas;
        $product -> pavadinimas = $request -> pavadinimas;
        $product -> likutis = $request -> likutis;
        $product -> svoris = $request -> svoris;
        $product -> vnt_dezeje = $request -> vnt_dezeje;
        $product -> gamintojas = $request -> gamintojas;
        $product -> tipas = $request -> tipas;
        $product -> vieta_sandelyje = $request -> vieta_sandelyje;

        $product->save();

        return redirect()->route('products.index')->with('success_message', 'Prekė, kodu "'.$product -> kodas.'" atnaujinta sėkmingai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product -> delete();
        
        return redirect()->route('products.index')->with('danger_message', 'Prekė kodu:"'.$product ->kodas.'" ištrinta.');
    }

    public function searchAjax()
    {

        $search = request() -> query('search');

        $products = Product::where('kodas', 'LIKE', "%$search%")
                            ->orWhere('barkodas', 'LIKE', "%$search%")
                            ->orWhere('pavadinimas', 'LIKE', "%$search%")
                            ->orWhere('gamintojas', 'LIKE', "%$search%")
                            ->orWhere('tipas', 'LIKE', "%$search%")
                            ->orWhere('vieta_sandelyje', 'LIKE', "%$search%")
                            ->get();

        return response()->json($products);

    }
}
