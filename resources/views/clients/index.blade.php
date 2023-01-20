@extends('layouts.app')
@section('content')

<div class="container">
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

            
            @if(isset($search))
            <div class="success">
                <p class=""success>Paieškos rezultatas pagal raktažodį: {{$search}}</p>
            </div>
            @endif

    <div class="head">
        <h2>Klientai</h2>
        <a class="btn btn-primary" href="{{route('clients.create')}}">Sukurti naują klientą</a>
    </div>
    <div class="row">
        <div class="col-4">
            <form id="searchAjax" url-clients-ajax-action="{{route('clients.searchAjax')}}">
                @csrf
                <input id="search" type="text" name="search" placeholder="Kliento paieška">
            </form>
        </div>
    </div>
    <div class="table">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Kliento ID</th>
                    <th>Kliento įm. kodas</th>
                    <th>Klientas</th>
                    <th>Adresas</th>
                    <th>Miestas</th>
                    <th>Pašto kodas</th>
                    <th>Telefono nr.</th>
                    <th>Elektroninis paštas</th>
                    <th>Veiksmai</th>
                </tr>
            </thead>
            <tbody class="clients">
            @foreach($clients as $client)
                <tr>
                    <td>{{$client -> id}}</td>
                    <td>{{$client -> im_kodas}}</td>
                    <td>{{$client -> klientas}}</td>
                    <td>{{$client -> adresas}}</td>
                    <td>{{$client -> miestas}}</td>
                    <td>{{$client -> pasto_kodas}}</td>
                    <td>{{$client -> telefonas}}</td>
                    <td>{{$client -> el_pastas}}</td>
                    <td><a class="btn btn-primary" href="{{route('clients.show', $client)}}">Rodyti</a></td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>
</div>

@endsection