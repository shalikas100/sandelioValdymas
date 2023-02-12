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
        <h2><i class="fa-solid fa-users-line"></i> Klientai</h2>
        <a class="btn btn-primary" href="{{route('clients.create')}}"><i class="fa-solid fa-user-plus"></i> Sukurti naują klientą</a>
    </div>
    <hr>
    <div class="row">
        <div class="col-4">
            <form id="searchAjax" url-clients-ajax-action="{{route('clients.searchAjax')}}">
                @csrf
                <input id="search_client" type="text" name="search" placeholder="Kliento paieška">
            </form>
        </div>
    </div>
    <div class="table">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Eil. Nr.</th>
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
                    <td>{{$loop -> iteration}}</td>
                    <td>{{$client -> im_kodas}}</td>
                    <td>{{$client -> klientas}}</td>
                    <td>{{$client -> adresas}}</td>
                    <td>{{$client -> miestas}}</td>
                    <td>{{$client -> pasto_kodas}}</td>
                    <td>{{$client -> telefonas}}</td>
                    <td>{{$client -> el_pastas}}</td>
                    <td><a class="btn btn-primary" href="{{route('clients.show', $client)}}"><i class="fa-solid fa-magnifying-glass"></i></a></td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>
</div>

@endsection