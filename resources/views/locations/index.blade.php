@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row" style="display:flex; justify-content: space-between;">
        <h3><i class="fa-solid fa-thumbtack"></i> Sandėlio vietos</h3>
        <a class="btn btn-primary" href="{{route('locations.create')}}"><i class="fa-solid fa-plus"></i> Sukurti vietą</a>
    </div>
    <div class="row">
        <div class="search">
            <input class="form-control" type="text" placeholder="Prekės paieška">
        </div>
        <div class="table">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Vietos ID</th>
                        <th>Vieta, <i style="font-size:12px;">(sekcija-vieta-aukštas)</i></th>
                        <!-- <th>Prekė</th> -->
                    </tr>
                </thead>
                <tbody class="locations">
                    @foreach($locations as $location)  
                    <tr>
                        <td>{{$location ->id}}</td>
                        <td>{{$location -> sekcija_vieta_aukstas}}</td>
                        <!-- <td>Preke</td> -->
                    </tr>
                    @endforeach   
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection