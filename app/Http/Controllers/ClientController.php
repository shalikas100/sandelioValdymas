<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();

        return view('clients.index', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
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
            'im_kodas' => 'required|min:4|max:20',
            'klientas' => 'required|min:3|max:64',
            'adresas' => 'required|min:6|max:64',
            'miestas' => 'required|min:2|max:64',
            'pasto_kodas' => 'required|integer|digits_between:5,5',
            'telefonas' => 'required|integer|digits_between:11,11',
            'el_pastas' => 'required|email',
        ]);


        $client = new Client();

        $client -> im_kodas = $request -> im_kodas;
        $client -> klientas = $request -> klientas;
        $client -> adresas = $request -> adresas;
        $client -> miestas = $request -> miestas;
        $client -> pasto_kodas = $request -> pasto_kodas;
        $client -> telefonas = $request -> telefonas;
        $client -> el_pastas = $request -> el_pastas;

        $client->save();

        return redirect()->route('clients.index')->with('success_message', 'Klientas "'.$client -> klientas.'" sukurtas sėkmingai');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('clients.show', ['client' => $client]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('clients.edit', ['client' => $client]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'im_kodas' => 'required|min:4|max:20',
            'klientas' => 'required|min:3|max:64',
            'adresas' => 'required|min:6|max:64',
            'miestas' => 'required|min:2|max:64',
            'pasto_kodas' => 'required|integer|digits_between:5,5',
            'telefonas' => 'required|integer|digits_between:11,11',
            'el_pastas' => 'required|email',
        ]);

        $client -> im_kodas = $request -> im_kodas;
        $client -> klientas = $request -> klientas;
        $client -> adresas = $request -> adresas;
        $client -> miestas = $request -> miestas;
        $client -> pasto_kodas = $request -> pasto_kodas;
        $client -> telefonas = $request -> telefonas;
        $client -> el_pastas = $request -> el_pastas;

        $client->save();

        return redirect()->route('clients.index')->with('success_message', 'Klientas "'.$client -> klientas.'" atnaujintas sėkmingai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {


        $clientOrders_count = $client -> clientOrders -> count();

        if ($clientOrders_count>0) {
            return redirect()->route('clients.index')->with('danger_message', 'Negalima ištrinti kliento "'.$client -> klientas.'", nes jis turi pardavimų');
        }

        $client -> delete();
        
        return redirect()->route('clients.index')->with('success_message', 'Klientas "'.$client ->klientas.'" ištrintas');
    }

    public function searchAjax()
    {

        $search = request() -> query('search');

        $clients = Client::where('klientas', 'LIKE', "%$search%")
                            ->orWhere('im_kodas', 'LIKE', "%$search%")
                            ->orWhere('adresas', 'LIKE', "%$search%")
                            ->orWhere('miestas', 'LIKE', "%$search%")
                            ->orWhere('telefonas', 'LIKE', "%$search%")
                            ->orWhere('el_pastas', 'LIKE', "%$search%")
                            ->get();

        return response()->json($clients);
    }


    
}
