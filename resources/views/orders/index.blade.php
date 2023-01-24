@extends('layouts.app')
@section('content')

<div class="container">
    <div class="head">
        <h2>Pardavimai</h2>
        <a class="btn btn-primary" href="{{route('orders.create')}}">Sukurti naują pardavimą</a>
    </div>
    <hr>
    <!-- Paspaudus sukurti pardavima turi atsirasti forma .form -->
    <div class="row">
        <div class="col-4">
            turi nesimatyti iki paspaudi sukurti nauja pardavima
            <h3>Naujas pardavimas</h3>
        <form class="form" action="{{route('orders.store')}}" method="post">
            @csrf
            <div class="form-group">
            <label for="">Pasirinkite klientą</label>
                <select name="client_id" id="client_id">
                        
                            @foreach($clients as $client)
                        <option value="{{$client -> id}}">{{$client -> klientas}},{{$client -> miestas}} </option>
                            @endforeach
                </select>
            </div>
            <div class="form-group">
            <label for="">Pristatymo būdai</label>
                <select name="pristatymo_budas" id="pristatymo_budas">
                    <option value="Atsiėmė vietoje">Atsiims vietoje</option>
                    <option value="Išsiųsti">Išsiųsti</option>
                    <option value="Nuvežti">Pristatyti</option>
                </select>
            </div>
                
                
                <button class="btn btn-primary" type="submit">Sukurti pardavimą</button>
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
                    <td><a class="btn btn-primary" href="{{route('orders.show', $order)}}">Pildyti užsakymą</a></td>
                </tr>
                @endforeach
                
            </table>
        </div>
    </div>
</div>

@endsection

