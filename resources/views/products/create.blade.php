@extends('layouts.app')
@section('content')

<div class="container">
<div class="col-6">
<div class="head">
                <h3>Prekės kūrimas</h3>
                <a class="btn btn-primary" href="{{route('products.index')}}">Grįžti į prekių sąrašą</a>
        </div>
    <div class="form">
    <form action="{{route('products.store')}}" method="post">

        @csrf
        
            <table class="table">
                <tr>
                    <th>Kodas</th>
                    <td><input type="text" name="kodas"></td>
                </tr>
                <tr>
                    <th>Barkodas</th>
                    <td><input type="text" name="barkodas"></td>
                </tr>
                <tr>
                    <th>Pavadinimas</th>
                    <td><input type="text" name="pavadinimas"></td>
                </tr>
                <tr>
                    <th>Likutis</th>
                    <td><input type="text" name="likutis"></td>
                </tr>
                <tr>
                    <th>Vnt. svoris (kg) </th>
                    <td><input type="text" name="svoris"></td>
                </tr>
                <tr>
                    <th>Vnt. dėžėje</th>
                    <td><input type="text" name="vnt_dezeje"></td>
                </tr>
                <tr>
                    <th>Gamintojas</th>
                    <td><input type="text" name="gamintojas"></td>
                </tr>
                <tr>
                    <th>Tipas</th>
                    <td><input type="text" name="tipas"></td>
                </tr>
                <tr>
                    <th>Vieta sandėlyje</th>
                    <td><input type="text" name="vieta_sandelyje"></td>
                </tr>
                <tr>
                    <th>Veiksmai</th>
                    <td><button class="btn btn-primary" type="submit">Įrašyti prekę</button></td>
                </tr>
                
            </table>
    </form>
    </div>
</div>         
</div>

@endsection