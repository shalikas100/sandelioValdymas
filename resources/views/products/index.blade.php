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
            
    <div class="head">
        <h2><i class="fa-solid fa-dolly"></i> Prekės</h2>
    </div>
    <hr>
    <div class="row">
        <div class="col-4">
            <form id="searchAjax" data-ajax-action-url="{{route('products.searchAjax')}}">
                <input id="search_product" type="text" name="search" placeholder="Prekės paieška">
            </form>
        </div>
    </div>
    <div class="table">
    <i style="font-size:12px;">* - (sekcija-vieta-aukštas)</i>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Eil. Nr.</th>
                <th>Kodas</th>
                <th>Barkodas</th>
                <th>Pavadinimas</th>
                <th>Likutis</th>
                <th>Vnt. svoris (kg)</th>
                <th>Vnt. pakuotėje</th>
                <th>Gamintojas</th>
                <th>Tipas</th>
                <th>Vieta sandėlyje*</th>
                <th>Veiksmai</th>
            </tr>
            </thead>
            <tbody class="products">
            @foreach($products as $product)
            <tr>
                <td>{{$loop -> iteration}}</td>
                <td>{{$product -> kodas}}</td>
                <td>{{$product -> barkodas}}</td>
                <td>{{$product -> pavadinimas}}</td>
                <td>{{$product -> likutis}}</td>
                <td>{{$product -> svoris}}</td>
                <td>{{$product -> vnt_dezeje}}</td>

                <td>{{$product -> productManufacturers -> manufacturer}}</td>
                
                <td>{{$product -> tipas}}</td>
                <td>{{$product -> productLocations -> sekcija_vieta_aukstas}}</td>
                <td><a class="btn btn-primary" href="{{route('products.show', $product)}}"><i class="fa-solid fa-magnifying-glass"></i></a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection