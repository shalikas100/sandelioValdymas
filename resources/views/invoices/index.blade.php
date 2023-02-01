@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12" style="display:flex; justify-content:space-between;">
            <h2>Pajamavimai</h2>
            <a class="btn btn-primary" href="{{route('invoices.create')}}">Sunurti naują pajamavimą</a>
        </div>    
    </div>
    <hr>
    <div class="row">
        <div class="col-6">
            <h3>Pajamavimo kūrimas</h3>
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

            <form class="form" action="{{route('invoices.store')}}" method="post">
            @csrf
                <div class="form-group">
                    <table class="table">
                        <tr>
                            <th>Pasirinkite gamintoją</th>
                            <td><select name="manufacturer_id" id="manufacturer_id" class="form-control @error('manufacturer_id') is-invalid @enderror"> 
                                <option value=""></option>   
                                    @foreach($manufacturers as $manufacturer)
                                <option value="{{$manufacturer -> id}}">{{$manufacturer -> manufacturer}}</option>
                                    @endforeach

                                </select>
                                        @error('manufacturer_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                            </td>
                        </tr>
                        <tr>
                            <th>Perkama ar grąžinama</th>
                            <td>
                                <select name="" id="">
                                    <option value="Pirkimas">Pirkimas</option>
                                    <option value="Grąžinimas">Grąžinimas</option>
                                </select>
                                
                            </td>
                        </tr>
                        <tr>
                            <th>Veiksmai</th>
                            <td>
                            <button class="btn btn-primary" type="submit">Sukurti pajamavimą</button>
                            </td>
                        </tr>
                    </table>
                </div>     
            </form>

        </div>
    </div>
    <div class="row">
    <div class="col-4">
            <form id="searchAjax" url-invoices-ajax-action="{{route('invoices.searchAjax')}}">
                @csrf
                <input id="search" type="text" name="search" placeholder="Kliento paieška">
            </form>
    </div>
    </div>
    <div class="row">
        <div class="col-8">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Pajamavimo nr.</th>
                    <th>Gamintojas</th>
                    <th>Sukūrimo data</th>
                    <th>Veiksmai</th>
                    <th></th>
                </tr>
                </thead>
                <tbody class="invoices">
                @foreach($invoices as $invoice)
                <tr>
                    <td>{{$invoice -> id}}</td>
                    <td>{{$invoice -> invoiceManufacturer -> manufacturer}}</td>
                    <td>{{$invoice -> created_at -> format('Y-m-d')}}</td>
                    <td><a class="btn btn-primary" href="{{route('invoices.show', $invoice)}}">Pildyti</a></td>
                    <td><a class="btn btn-secondary"  href="{{route('invoices.edit', $invoice)}}">Keisti</a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
