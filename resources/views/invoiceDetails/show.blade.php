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
                    </table>
                    <hr>
            </div>    
        </div>
        <!-- uzsakym lentele -->
        <div class="table col-8">
            <!-- prekiu forma -->
            <div class="col-6 form">  
                
                <h3>Suvestos prekės</h5>     
                
                
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
                </tr>
                @foreach($invoice -> invoiceInvoiceDetails as $invoiceDetail)
                <tr>
                    <td>{{$loop -> iteration}}</td>
                    <td> {{$invoiceDetail -> invoiceDetailProducts -> kodas}}</td>
                    <td>{{$invoiceDetail -> invoiceDetailProducts -> pavadinimas}}</td>
                    <td>{{$invoiceDetail -> inv_kiekis}}</td>
                    <td>{{$invoiceDetail -> inv_kiekis * $invoiceDetail -> invoiceDetailProducts -> svoris}} kg</td>  
                    <td>{{$invoiceDetail -> invoiceDetailProducts -> productLocations -> sekcija_vieta_aukstas}}</td>
                    </tr>
                @endforeach
            </table>
            </div>
            
        </div>
    </div>
    <hr>
</div>

@endsection