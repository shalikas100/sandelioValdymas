@extends('layouts.app')
@section('content')

<div class="container">
    <div class="head">
        <h2>Pardavimai</h2>
        <a class="btn btn-primary" href="{{route('orders.create')}}">Sukurti naują pardavimą</a>
    </div>
    <!-- Paspaudus sukurti pardavima turi atsirasti forma .form -->
    <div class="row">
        <div class="col-4">
        <form class="form" action="{{route('orders.store')}}" method="post">
            @csrf
                <select name="client_id" id="client_id">
                        <option value="">Pasirintite klientą</option>
                            @foreach($clients as $client)
                        <option value="{{$client -> id}}">{{$client -> klientas}},{{$client -> miestas}} </option>
                            @endforeach
                </select>
                <select name="pristatymo_budas" id="pristatymo_budas">
                    <option value="Atsiėmė vietoje">Atsiėmė vietoje</option>
                    <option value="Išsiųsti">Išsiųsti</option>
                    <option value="Nuvežti">Nuvežti</option>
                </select>
                <button class="btn btn-primary" type="submit">Sukurti pardavima</button>
        </form>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <table class="table table-stripe">
                <tr>
                    <th>Sąskaitos nr.</th>
                    <th>Klientas</th>
                    <th>Sukūrimo data</th>
                    <th>Pristatymo būdas</th>
                    <th>Veiksmai</th>
                </tr>
                @foreach($orders as $order)
                <tr>
                    <td>{{10000 + $order -> id}}</td>
                    <td>{{$order -> orderClients -> klientas}}</td>
                    <td>{{$order -> created_at -> format('Y-m-d')}}</td>
                    <td>{{$order -> pristatymo_budas}}</td>
                    <td><a class="btn btn-primary" href="{{route('orders.show', $order)}}">Pildyti uzsakyma</a></td>
                </tr>
                @endforeach
                
            </table>
        </div>
    </div>
</div>

@endsection

