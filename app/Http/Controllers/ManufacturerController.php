<?php

namespace App\Http\Controllers;

use App\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manufacturers = Manufacturer::all();

        return view('manufacturers.index', ['manufacturers' => $manufacturers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manufacturers.create');
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
            'manufacturer' =>'required|min:3|max:64',
        ]);
        

        $manufacturer = new Manufacturer();

        $manufacturer -> manufacturer = $request -> manufacturer;

        $manufacturer -> save();

        return redirect()->route('manufacturers.index')->with('success_message', 'Gamintojas sukurtas sėkmingai');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function show(Manufacturer $manufacturer)
    {
        return view('manufacturers.show', ['manufacturer' => $manufacturer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function edit(Manufacturer $manufacturer)
    {
        return view('manufacturers.edit', ['manufacturer' => $manufacturer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manufacturer $manufacturer)
    {
        $request->validate([
            'manufacturer' =>'required|min:3|max:64',
        ]);

        $manufacturer -> manufacturer = $request -> manufacturer;

        $manufacturer -> save();

        return redirect()->route('manufacturers.index')->with('success_message', 'Gamintojas "'.$manufacturer -> manufacturer.'" atnaujintas sėkmingai');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manufacturer $manufacturer)
    {

        $manufacturerInvoices_count = $manufacturer -> manufacturerInvoice -> count();

        if ($manufacturerInvoices_count>0) {
            return redirect()->route('manufacturers.index')->with('danger_message', 'Negalima ištrinti gamintojo "'.$manufacturer -> manufacturer.'", nes jis turi pajamavimų');
        }

        $manufacturer -> delete();

        return redirect()->route('manufacturers.index')->with('success_message', 'Gamintojas "'.$manufacturer ->manufacturer.'" ištrintas');
    }


    public function searchAjax()
    {

        $search = request() -> query('search');

        $manufacturers = Manufacturer::where('manufacturer', 'LIKE', "%$search%")
                            ->orWhere('id', 'LIKE', "%$search%")
                            ->get();

        return response()->json($manufacturers);
    }
}
