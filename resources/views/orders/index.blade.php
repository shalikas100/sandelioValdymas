@extends('layouts.app')
@section('content')

<div class="container">
    <div class="head">
        <h2><i class="fa-regular fa-folder"></i> Pardavimai</h2>
        <!-- <a class="btn btn-primary" href="{{route('orders.create')}}">Sukurti naują pardavimą</a> -->
    </div>
    <hr>
    <!-- Paspaudus sukurti pardavima turi atsirasti forma .form -->
    <div class="row">
        <div class="col-6">
            <h3>Pardavimo kūrimas</h3>
                    @if(session('success_message'))
                        <div class="alert alert-success">
                            {{ session('success_message')}}
                        </div>
                    @endif
                    @if(session('danger_message'))
                        <div class="alert alert-danger">
                            {{ session('danger_message')}}
                        </div>
                    @endif
        <form class="form" action="{{route('orders.store')}}" method="post">
            @csrf
            <div class="form-group">
                <table class="table">
                    <tr>
                        <th>Pasirinkite klientą</th>
                        <td><select name="client_id" id="client_id" class="form-control @error('client_id') is-invalid @enderror"> 
                            <option value="" disabled selected>Pasirinkite klientą</option>   
                                @foreach($clients as $client)
                            <option value="{{$client -> id}}">{{$client -> klientas}}, {{$client -> miestas}} </option>
                                @endforeach
                            </select>
                                    @error('client_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror</td>
                    </tr>
                    <tr>
                        <th>Pristatymo būdai</th>
                        <td>
                            <select name="pristatymo_budas" id="pristatymo_budas" class="form-control @error('pristatymo_budas') is-invalid @enderror">
                                <option value="" disabled selected>Pasirinkite pristatymo būdą</option>
                                <option value="Atsiims vietoje">Atsiims vietoje</option>
                                <option value="Išsiųsti">Išsiųsti</option>
                                <option value="Pristatyti">Pristatyti</option>
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
                        <button class="btn btn-primary" type="submit"><i class="fa-solid fa-floppy-disk"></i> Sukurti pardavimą</button>
                        </td>
                    </tr>
                </table>
            </div>     
        </form>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Pardavimo nr.</th>
                    <th>Klientas</th>
                    <th>Sukūrimo data</th>
                    <th>Pristatymo būdas</th>
                    <th>Veiksmai</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody></tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{10000 + $order -> id}}</td>
                    <td>{{$order -> orderClients -> klientas}}</td>
                    <td>{{$order -> created_at -> format('Y-m-d')}}</td>
                    <td>{{$order -> pristatymo_budas}}</td>
                    <td><a class="btn btn-primary" href="{{route('orders.show', $order)}}"><i class="fa-solid fa-plus"></i> Pildyti</a></td>
                    <td><a class="btn btn-secondary"  href="{{route('orders.edit', $order)}}"><i class="fa-solid fa-pencil"></i> Keisti</a></td>
                    <td><a class="btn btn-primary" href="{{route('orderDetails.show',$order)}}"><i class="fa-solid fa-magnifying-glass"></i></a></td>

                    
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

