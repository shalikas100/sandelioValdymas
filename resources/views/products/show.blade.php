@extends('layouts.app')
@section('content')


<div class="container">
    <div class="col-5">
        <div class="head">
            <h3>Prekė: {{$product -> pavadinimas}}, {{$product -> kodas}}</h3>
            <a class="btn btn-primary" href="{{route('products.index')}}">Grįžti į prekių sąrašą</a>
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
                <th>Vnt. dėžėje</th>
                <td>{{$product -> vnt_dezeje}}</td>
            </tr>
            <tr>
                <th>Gamintojas</th>
                <td>{{$product -> gamintojas}}</td>
            </tr>
            <tr>
                <th>Tipas</th>
                <td>{{$product -> tipas}}</td>
            </tr>
            <tr>
                <th>Vieta sandėlyje</th>
                <td>{{$product -> vieta_sandelyje}}</td>
            </tr>
            <tr>
                <th>Veiksmai</th>
                <td><a class="btn btn-primary" href="{{route('products.edit', $product)}}">Redaguoti duomenis</a></td>
            </tr>
        </table>
    </div>
</div>
@endsection