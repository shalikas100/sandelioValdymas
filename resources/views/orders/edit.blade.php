@extends('layouts.app')
@section('content')

<div class="container">
    <div class="col-8">
    <div class="row">
            <h3>Pardavimo redagavimas</h3>
                <form action="{{route('orders.destroy', $order)}}" method="post">
                    @csrf
                    <button class="btn btn-danger">Ištrinti pardavimą</button>
                </form>
            <a class="btn btn-primary" href="{{route('orders.index')}}">Grįžti į pardavimų sąrašą</a>
    </div>
    <div class="row">
    <form class="form" action="{{route('orders.update', $order)}}" method="post">
            @csrf
            <div class="form-group">
                <table class="table">
                    <tr>
                        <th>Redaguoti klientą</th>
                        <td><select name="client_id" id="client_id" class="form-control @error('client_id') is-invalid @enderror"> 
                            <option value="{{$order -> client_id}}">{{$order -> orderClients -> klientas}}</option>
                                @foreach($clients as $client)
                            <option value="{{$client -> id}}">{{$client -> klientas}},{{$client -> miestas}} </option>
                                @endforeach
                            </select>
                                    @error('client_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                        </td>
                    </tr>
                    <tr>
                        <th>Redaguoti pristatymo būdą</th>
                        <td>
                            <select name="pristatymo_budas" id="pristatymo_budas" class="form-control @error('pristatymo_budas') is-invalid @enderror">
                                <option value="{{$order -> pristatymo_budas}}">{{$order -> pristatymo_budas}}</option>
                                <option value="Atsiėmė vietoje">Atsiims vietoje</option>
                                <option value="Išsiųsti">Išsiųsti</option>
                                <option value="Nuvežti">Pristatyti</option>
                            </select>
                                    @error('pristatymo_budas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                        </td>
                    </tr>
                    <tr>
                        <th>Veiksmai</th>
                        <td>
                            <button class="btn btn-primary" type="submit">Išsaugoti pakeitimus</button>
                        </td>
                    </tr>
                </table>
            </div>     
        </form>
        </div>
    </div>
</div>

@endsection