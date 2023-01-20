@extends('layouts.app')
@section('content')

<div class="container">
    <div class="col-8">
        <div class="head">
            <h3>Kliento "{{$client -> klientas}}" redagavimas</h3>
                <form action="{{route('clients.destroy', $client)}}" method="post">
                    @csrf
                    <button class="btn btn-danger">Ištrinti klientą</button>
                </form>
            <a class="btn btn-primary" href="{{route('clients.index')}}">Grįžti į klientų sąrašą</a>
        </div>
        <div class="form">
            <form action="{{route('clients.update', $client)}}" method="post">
                @csrf
                    <table class="table">
                        <tr>
                            <th>Kliento įm. kodas</th>
                            <td><input type="text" name="im_kodas" value="{{$client -> im_kodas}}"></td>
                        </tr>
                        <tr>
                            <th>Klientas</th>
                            <td><input type="text" name="klientas" value="{{$client -> klientas}}"></td>
                        </tr>
                        <tr>
                            <th>Adresas</th>
                            <td><input type="text" name="adresas" value="{{$client -> adresas}}"></td>
                        </tr>
                        <tr>
                            <th>Miestas</th>
                            <td><input type="text" name="miestas" value="{{$client -> miestas}}"></td>
                        </tr>
                        <tr>
                            <th>Pašto kodas</th>
                            <td><input type="text" name="pasto_kodas" value="{{$client -> pasto_kodas}}"></td>
                        </tr>
                        <tr>
                            <th>Telefono nr.</th>
                            <td><input type="text" name="telefonas" value="{{$client -> telefonas}}"></td>
                        </tr>
                        <tr>
                            <th>Elektroninis paštas</th>
                            <td><input type="text" name="el_pastas" value="{{$client -> el_pastas}}"></td>
                        </tr>
                        <tr>
                            <th>Veiksmai</th>
                            <td><button class="btn btn-primary" type="submit">Redaguoti klientą</button>
                            </td>
                        </tr>
                    </table>
            </form>
        </div>
    </div>        
</div>

@endsection
