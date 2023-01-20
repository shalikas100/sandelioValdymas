@extends('layouts.app')
@section('content')

<div class="container">
            @if(session('success_message'))
                <div class="alert alert-success">
                    {{ session('success_message')}}
                </div>
            @endif
    <div class="head">
        <h2>Prekės</h2>
        <a class="btn btn-primary" href="{{route('products.create')}}">Sukurti naują prekę</a>
    </div>
    <div class="row">
        <div class="col-4">
            <form id="searchAjax" url-products-ajax-action="{{route('products.searchAjax')}}">
                <input id="search" type="text" name="search" placeholder="Prekės paieška">
            </form>
        </div>
    </div>
    <div class="table">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Kodas</th>
                <th>Barkodas</th>
                <th>Pavadinimas</th>
                <th>Likutis</th>
                <th>Vnt. svoris (kg)</th>
                <th>Vnt. dėžėje</th>
                <th>Gamintojas</th>
                <th>Tipas</th>
                <th>Vieta sandėlyje</th>
                <th>Veiksmai</th>
            </tr>
            </thead>
            <tbody class="products">
            @foreach($products as $product)
            <tr>
                <td>{{$product -> kodas}}</td>
                <td>{{$product -> barkodas}}</td>
                <td>{{$product -> pavadinimas}}</td>
                <td>{{$product -> likutis}}</td>
                <td>{{$product -> svoris}}</td>
                <td>{{$product -> vnt_dezeje}}</td>
                <td>{{$product -> gamintojas}}</td>
                <td>{{$product -> tipas}}</td>
                <td>{{$product -> vieta_sandelyje}}</td>
                <td><a class="btn btn-primary" href="{{route('products.show', $product)}}">Rodyti</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection