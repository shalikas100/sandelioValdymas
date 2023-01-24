@extends('layouts.app')
@section('content')
<div class="container">

            @if(session('danger_message'))
                <div class="alert alert-danger">
                    {{ session('danger_message')}}
                </div>
            @endif

            <div class="header" style="display:flex; justify-content: end">
                <div class="col-2"><a class="btn btn-primary" href="{{route('orders.index')}}">Grįžti į pardavimus</a></div>             
            </div>
    <hr>
    <div style="display:flex;">
        <div class="order-details col-4" style="display:flex; flex-direction:column;">
            <!-- uzsakymo duomenys -->
            <div class="duomenys">
                <h3>Užsakymo duomenys</h3>
                    <table class="table">
                        <tr>
                            <th>Užsakymo nr.</th>
                            <td>{{10000 + $order -> id}}</td>
                        </tr>
                        <tr>
                            <th>Užsakymo data</th>
                            <td>{{$order -> created_at -> format('Y-m-d')}}</td>
                        </tr>
                        <tr>
                            <th>Pristatymo būdas</th>
                            <td>{{$order -> pristatymo_budas}}</td>
                        </tr>
                    </table>
                    <hr>
                    <h3>Kliento duomenys</h3>
                    <table class="table">
                        <tr>
                            <th>Įmonės kodas</th>
                            <td>{{$order -> orderClients -> im_kodas}}</td>
                        </tr>
                        <tr>
                            <th>Klientas</th>
                            <td>{{$order -> orderClients -> klientas}}</td>
                        </tr>
                        <tr>
                            <th>Adresas</th>
                            <td>{{$order -> orderClients -> adresas}}</td>
                        </tr>
                        <tr>
                            <th>Miestas</th>
                            <td>{{$order -> orderClients -> miestas}}</td>
                        </tr>
                        <tr>
                            <th>Pašto kodas</th>
                            <td>{{$order -> orderClients -> pasto_kodas}}</td>
                        </tr>
                        <tr>
                            <th>Telefonas</th>
                            <td>{{$order -> orderClients -> telefonas}}</td>
                        </tr>
                        <tr>
                            <th>El. paštas</th>
                            <td>{{$order -> orderClients -> el_pastas}}</td>
                        </tr>
                    </table>
                    <hr>
            </div>    
        </div>
        <!-- uzsakym lentele -->
        <div class="table col-8">
            <!-- prekiu forma -->
            <div class="form">  
                <h3>Prekės įvedimas</h5>     
                <form action="{{route('orders.storeProducts')}}" method="post">
                @csrf
                    <input type="hidden" name="details_id" placeholder="details_id" value="{{$order -> id}}">

                    <select name="product_id" id="product_id" class="form-control @error('product_id') is-invalid @enderror">
                        <option value="preke">Pasirinkite prekę</option>
                        @foreach($allProducts as $product)
                        <option value="{{$product -> id}}">{{$product -> kodas}}, Likutis {{$product -> likutis}}</option>
                        @endforeach
                    </select>
                    @error('product_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror

                    <input type="text" name="kiekis" placeholder="Kiekis" class="form-control @error('kiekis') is-invalid @enderror">
                    @error('kiekis')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                     @enderror

                    <button class="btn-xs btn-primary" type="submit">Įtraukti</button>
                </form>
                <hr>
            </div>
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
                @foreach($order -> orderOrderDetails as $orderDetail)
                <tr>
                    <td>{{$loop -> iteration}}</td>
                    <td> {{$orderDetail -> orderDetailProducts -> kodas}}</td>
                    <td>{{$orderDetail -> orderDetailProducts -> pavadinimas}}</td>
                    <td>{{$orderDetail -> kiekis}}</td>
                    <td>{{$orderDetail -> kiekis * $orderDetail -> orderDetailProducts -> svoris}} kg</td>  
                    <td>{{$orderDetail -> orderDetailProducts -> vieta_sandelyje}}</td>
                    <td>
                        <form action="{{route('orderDetails.destroy', $orderDetail)}}" method="post">
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