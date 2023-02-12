@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12" style="display:flex; justify-content:space-between;">
            <h2><i class="fa-regular fa-folder"></i> Pajamavimai</h2>
            <!-- <a class="btn btn-primary" href="{{route('invoices.create')}}">Sunurti naują pajamavimą</a> -->
        </div>    
    </div>
    <hr>
    <div class="row">
        <div class="col-6">
            <h3>Pajamavimo kūrimas</h3>
                    
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
                                <option value="" disabled selected>Pasirinkite gamintoją</option>   
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
                                <select name="pirkimas_grazinimas" id="pirkimas_grazinimas" class="form-control @error('pirkimas_grazinimas') is-invalid @enderror">
                                    <option value="" disabled selected>Pirkimas/Grąžinimas</option>
                                    <option value="Pirkimas">Pirkimas</option>
                                    <option value="Grąžinimas">Gražinimas</option>
                                </select>
                                    @error('pirkimas_grazinimas')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                
                            </td>
                        </tr>
                        <tr>
                            <th>Veiksmai</th>
                            <td>
                            <button class="btn btn-primary" type="submit"><i class="fa-solid fa-floppy-disk"></i> Sukurti pajamavimą</button>
                            </td>
                        </tr>
                    </table>
                </div>     
            </form>

        </div>
    </div>
    <!-- <div class="row">
    <div class="col-4">
            <form id="searchAjax" url-invoices-ajax-action="{{route('invoices.searchAjax')}}">
                @csrf
                <input id="search_invoice" type="text" name="search" placeholder="Kliento paieška">
            </form>
    </div>
    </div> -->
    @if(session('success_message'))
                        <div class="alert alert-success">
                            {{ session('success_message')}}
                        </div>
                    @endif
    <div class="row">
        <div class="col-8">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Pajamavimo nr.</th>
                    <th>Gamintojas</th>
                    <th>Pirkimas/Grąžinimas</th>
                    <th>Sukūrimo data</th>
                    <th>Veiksmai</th>
                    <th></th>
                </tr>
                </thead>
                <tbody class="invoices">
                @foreach($invoices as $invoice)
                <tr>
                    <td>{{str_pad($invoice -> id, 7, 'PAJ000', STR_PAD_LEFT)}}</td>
                    <td>{{$invoice -> invoiceManufacturer -> manufacturer}}</td>
                    <td>{{$invoice -> pirkimas_grazinimas}}</td>
                    <td>{{$invoice -> created_at -> format('Y-m-d')}}</td>
                    <td><a class="btn btn-primary" href="{{route('invoices.show', $invoice)}}"><i class="fa-solid fa-plus"></i> Pildyti</a></td>
                    <td><a class="btn btn-secondary"  href="{{route('invoices.edit', $invoice)}}"><i class="fa-solid fa-pencil"></i> Keisti</a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
