@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="head">
            <h2>Uzsakymo detales</h2>
            <a class="btn btn-primary btn-sm" href="{{route('orders.index')}}">Grizti</a>
        </div>
    </div>
    <div class="row">
        <div class="detales">
            <!-- Uzsakymo duomenys -->
            <h3>Uzsakymo duomenys:</h3>
                <h5>Užsakymo nr.: {{10000 + $order -> id}}</h5>
                <h5>Užsakymo data: {{$order -> created_at}}</h5>
        </div>
    </div>
    <div class="row">
        <div class="detales">
                <!-- Uzsakancio kliento duomenys -->
                <h3>Kliento duomenys:</h3>
                <h5>Įmonės kodas: {{$order -> orderClients -> im_kodas}}</h5>
                <h5>Klientas: {{$order -> orderClients -> klientas}}</h5>
                <h5>Adresas: {{$order -> orderClients -> adresas}}</h5>
                <h5>Miestas: {{$order -> orderClients -> miestas}}</h5>
                <h5>Pašto kodas: {{$order -> orderClients -> pasto_kodas}}</h5>
                <h5>Telefonas: {{$order -> orderClients -> telefonas}}</h5>
                <h5>El. paštas: {{$order -> orderClients -> el_pastas}}</h5>
        </div>
    </div>
    <div class="row">
        <!-- Uzsakomu prekiu saraso pildymas -->
        <form action="{{route('orders.storeProducts')}}" method="post">
            @csrf
            <input type="hidden" name="details_id" placeholder="details_id" value="{{$order -> id}}">
            <input type="text" name="product_id" placeholder="product_id">
            <input type="text" name="kiekis" placeholder="kiekis">
            <button type="submit">itraukti</button>
        </form>
    </div>
            <!-- Uzsakomos prekes -->
            <table class="table table-stripe">
                <tr>
                    <th>Eil. Nr.</th>
                    <th>prekes kodo id</th>
                    <th>Pavadinimas</th>
                    <th>Kiekis</th>
                    <th>pozicijos svoris</th>
                </tr>
                @foreach($order -> orderOrderDetails as $product)
                <tr>
                    <td>{{$product -> details_id}}</td>
                    <td>{{$product -> orderDetailProducts -> kodas}} ({{$product -> orderDetailProducts -> svoris}})</td>
                    <td>{{$product -> orderDetailProducts -> pavadinimas}}</td>
                    <td>{{$product -> kiekis}}</td>
                    <td>{{$product -> kiekis * $product -> orderDetailProducts -> svoris}} kg</td>    
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection