@extends('layouts.app')
@section('content')

<div class="container">
<div class="col-6">
<div class="head">
                <h3>Prekės redagavimas</h3>
                <form action="{{route('products.destroy', $product)}}" method="post">
                    @csrf
                    <button class="btn btn-danger">Ištrinti prekę</button>
                </form>
                
                <a class="btn btn-primary" href="{{route('products.index')}}">Grįžti į prekių sąrašą</a>
        </div>
    <div class="form">
    <form action="{{route('products.update', $product)}}" method="post">

        @csrf
        
            <table class="table">
                <tr>
                    <th>Kodas</th>
                    <td><input type="text" name="kodas" value="{{$product ->kodas}}"></td>
                </tr>
                <tr>
                    <th>Barkodas</th>
                    <td><input type="text" name="barkodas" value="{{$product ->barkodas}}"></td>
                </tr>
                <tr>
                    <th>Pavadinimas</th>
                    <td><input type="text" name="pavadinimas" value="{{$product ->pavadinimas}}"></td>
                </tr>
                <tr>
                    <th>Likutis</th>
                    <td><input type="text" name="likutis" value="{{$product ->likutis}}"></td>
                </tr>
                <tr>
                    <th>Vnt. svoris (kg) </th>
                    <td><input type="text" name="svoris" value="{{$product ->svoris}}"></td>
                </tr>
                <tr>
                    <th>Vnt. dėžėje</th>
                    <td><input type="text" name="vnt_dezeje" value="{{$product ->vnt_dezeje}}"></td>
                </tr>
                <tr>
                    <th>Gamintojas</th>
                    <td><input type="text" name="gamintojas" value="{{$product ->gamintojas}}"></td>
                </tr>
                <tr>
                    <th>Tipas</th>
                    <td><input type="text" name="tipas" value="{{$product ->tipas}}"></td>
                </tr>
                <tr>
                    <th>Vieta sandėlyje</th>
                    <td><input type="text" name="vieta_sandelyje" value="{{$product ->vieta_sandelyje}}"></td>
                </tr>
                <tr>
                    <th>Veiksmai</th>
                    <td><button class="btn btn-primary" type="submit">Išsaugoti pakeitimus</button>
                    </td>
                </tr>
                
            </table>
    </form>
    </div>
</div>         
</div>

@endsection