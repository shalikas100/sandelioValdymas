@extends('layouts.app')
@section('content')

<div class="container">
    <div class="col-6">
        <div class="head">
                <h3>Kliento kūrimas</h3>
                <a class="btn btn-primary" href="{{route('clients.index')}}">Grįžti į klientų sąrašą</a>
        </div>
        <div class="form">
            <form action="{{route('clients.store')}}" method="post">

                @csrf
                
                    <table class="table">
                        <tr>
                            <th>Kliento įm. kodas</th>
                            <td><input type="text" name="im_kodas"></td>
                        </tr>
                        <tr>
                            <th>Klientas</th>
                            <td><input type="text" name="klientas"></td>
                        </tr>
                        <tr>
                            <th>Adresas</th>
                            <td><input type="text" name="adresas"></td>
                        </tr>
                        <tr>
                            <th>Miestas</th>
                            <td><input type="text" name="miestas"></td>
                        </tr>
                        <tr>
                            <th>Pašto kodas</th>
                            <td><input type="text" name="pasto_kodas"></td>
                        </tr>
                        <tr>
                            <th>Telefono nr.</th>
                            <td><input type="text" name="telefonas"></td>
                        </tr>
                        <tr>
                            <th>Elektroninis paštas</th>
                            <td><input type="text" name="el_pastas"></td>
                        </tr>
                        <tr>
                            <th>Veiksmai</th>
                            <td><button class="btn btn-primary" type="submit">Įrašyti klientą</button></td>
                        </tr>
                        
                    </table>
            </form>
        </div>  
    </div>     
</div>

@endsection