@extends('layouts.app')
@section('content')


<div class="container">
    <div class="col-5">
        <div class="head">
            <h3>{{$client -> klientas}}</h3>
            <a class="btn btn-primary" href="{{route('clients.index')}}">Grįžti į klientų sąrašą</a>
        </div>
        
        <table class="table">
            <tr>
                <th>Kliento įm. kodas</th>
                <td>{{$client -> im_kodas}}</td>
            </tr>
            <tr>
                <th>Adresas</th>
                <td>{{$client -> adresas}}</td>
            </tr>
            <tr>
                <th>Miestas</th>
                <td>{{$client -> miestas}}</td>
            </tr>
            <tr>
                <th>Pašto kodas</th>
                <td>{{$client -> pasto_kodas}}</td>
            </tr>
            <tr>
                <th>Telefono nr.</th>
                <td>{{$client -> telefonas}}</td>
            </tr>
            <tr>
                <th>Elektroninis paštas</th>
                <td>{{$client -> el_pastas}}</td>
            </tr>
            <tr>
                <th>Veiksmai</th>
                <td><a class="btn btn-primary" href="{{route('clients.edit', $client)}}">Redaguoti duomenis</a></td>   
            </tr>
        </table>
    </div>
</div>
@endsection