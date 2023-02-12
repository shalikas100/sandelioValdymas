@extends('layouts.app')
@section('content')


<div class="container">
    <div class="col-5">
        <div class="head">
            <h3><i class="fa-solid fa-circle-info"></i> Informacija</h3>
            <a class="btn btn-primary" href="{{route('products.index')}}"><i class="fa-solid fa-circle-chevron-left"></i> Grįžti į prekių sąrašą</a>
        </div>
        
        <table class="table">
            <tr>
                <th>Kodas</th>
                <td>{{$product -> kodas}}</td>
            </tr>
            <tr>
                <th>Barkodas</th>
                <td>{{$product -> barkodas}}</td>
            </tr>
            <tr>
                <th>Pavadinimas</th>
                <td>{{$product -> pavadinimas}}</td>
            </tr>
            <tr>
                <th>Likutis</th>
                <td>{{$product -> likutis}}</td>
            </tr>
            <tr>
                <th>Vnt. svoris (kg)</th>
                <td>{{$product -> svoris}}</td>
            </tr>
            <tr>
                <th>Vnt. pakuotėje</th>
                <td>{{$product -> vnt_dezeje}}</td>
            </tr>
            <tr>
                <th>Gamintojas</th>
                <td>{{$product -> productManufacturers -> manufacturer}}</td>
            </tr>
            <tr>
                <th>Tipas</th>
                <td>{{$product -> tipas}}</td>
            </tr>
            <tr>
                <th>Vieta sandėlyje</th>
                <td>{{$product -> productLocations -> sekcija_vieta_aukstas}}</td>
            </tr>
            <tr>
                <th>Veiksmai</th>
                <td><a class="btn btn-primary" href="{{route('products.edit', $product)}}"><i class="fa-solid fa-pencil"></i> Redaguoti duomenis</a></td>
            </tr>
        </table>
    </div>
</div>
@endsection