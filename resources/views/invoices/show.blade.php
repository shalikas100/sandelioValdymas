@extends('layouts.app')
@section('content')
<div class="container">

            @if(session('danger_message'))
                <div class="alert alert-danger">
                    {{ session('danger_message')}}
                </div>
            @endif

            @if(session('success_message'))
                <div class="alert alert-success">
                    {{ session('success_message')}}
                </div>
            @endif

            <div class="header" style="display:flex; justify-content: end">
                <div class="col-2"><a class="btn btn-primary" href="{{route('invoices.index')}}"><i class="fa-solid fa-circle-chevron-left"></i> Grįžti į pajamavimus</a></div>             
            </div>
    <hr>
    <div style="display:flex;">
        <div class="order-details col-4" style="display:flex; flex-direction:column;">
            <!-- pajamavimo duomenys -->
            <div class="duomenys">
                <h3>Pajamavimo duomenys</h3>
                    <table class="table">
                        <tr>
                            <th>Pajamavimo nr.</th>
                            <td>{{str_pad($invoice -> id, 7, 'PAJ000', STR_PAD_LEFT)}}</td>
                        </tr>
                        <tr>
                            <th>Pirkimas/Grąžinimas</th>
                            <td>{{$invoice -> pirkimas_grazinimas}}</td>
                        </tr>
                        <tr>
                            <th>Pajamavimo data</th>
                            <td>{{$invoice -> created_at -> format('Y-m-d')}}</td>
                        </tr>
                    </table>
                    <hr>
                    <h3>Gamintojo duomenys</h3>
                    <table class="table">
                        <tr>
                            <th>Gamintojas</th>
                            <td>{{$invoice -> invoiceManufacturer -> manufacturer}}</td>
                        </tr>
                            <th></th>
                            <td><a class="btn btn-primary" href="{{route('manufacturers.showInvoices', $invoice -> manufacturer_id)}}">Gamintojo visi pajamavimai</a></td>
                    </table>
                    <hr>
            </div>    
        </div>
        <!-- uzsakym lentele -->
        <div class="table col-8">
            <!-- prekiu forma -->
            <div class="col-6 form">  
                
                <h3>Prekės įvedimas</h5>     
                
                <form action="{{route('invoices.storeProducts')}}" method="post">
                @csrf
                    <input type="hidden" name="inv_details_id" placeholder="inv_details_id" value="{{$invoice -> id}}">
                   
                    <a class="btn btn-primary mb-2" href="{{route('products.create', $invoice)}}"><i class="fa-solid fa-plus"></i><i class="fa-solid fa-dolly"></i> Sukurti prekę</a>
                    
                    <select name="inv_product_id" id="inv_product_id" class="form-control mb-2 @error('inv_product_id') is-invalid @enderror">
                            <option value="" disabled selected>Pasirinkite prekę</option>
                        @foreach($allProducts as $product)
                             <option value="{{$product -> id}}">{{$product -> pavadinimas}}, Likutis {{$product -> likutis}}</option>   
                        @endforeach
                    </select>

                        @error('inv_product_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror

                    <input type="text" name="inv_kiekis" placeholder="Kiekis" class="form-control mb-2 @error('inv_kiekis') is-invalid @enderror">
                        @error('inv_kiekis')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror

                    <button class="btn-xs btn-primary" type="submit">Įtraukti</button>
                </form>
            </div>
            <hr>
            <div class="table">
            <table class="table table-striped">
                <tr>
                    <th>Eil. Nr.</th>
                    <th>Prekės kodas</th>
                    <th>Pavadinimas</th>
                    <th>Kiekis</th>
                    <th>Pozicijos svoris</th>
                    <th>Vieta sandėlyje</th>
                    <th>Išrtinti</th>
                </tr>
                @foreach($invoice -> invoiceInvoiceDetails as $invoiceDetail)
                <tr>
                    <td>{{$loop -> iteration}}</td>
                    <td> {{$invoiceDetail -> invoiceDetailProducts -> kodas}}</td>
                    <td>{{$invoiceDetail -> invoiceDetailProducts -> pavadinimas}}</td>
                    <td>{{$invoiceDetail -> inv_kiekis}}</td>
                    <td>{{$invoiceDetail -> inv_kiekis * $invoiceDetail -> invoiceDetailProducts -> svoris}} kg</td>  
                    <td>{{$invoiceDetail -> invoiceDetailProducts -> productLocations -> sekcija_vieta_aukstas}}</td>
                    <td>
                        <form action="{{route('invoiceDetails.destroy', $invoiceDetail)}}" method="post">
                            @csrf
                            <button class="btn-sx btn-primary">Ištrinti</button></td>  
                        </form>
                    </tr>
                @endforeach
            </table>
            </div>
            
        </div>
    </div>
    <hr>
</div>
@endsection