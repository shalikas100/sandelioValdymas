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
        <h2>Prekės</h2>
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
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Eil. Nr.</th>
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
                <td>{{$loop -> iteration}}</td>
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