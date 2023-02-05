@extends('layouts.app')
@section('content')

<div class="container">
<div class="col-6">
<div class="head">
                <h3>Prekės kūrimas</h3>
                <a class="btn btn-primary" href="{{route('products.index')}}">Grįžti į prekių sąrašą</a>
        </div>
    <div class="form">
    <form action="{{route('products.store', $invoice)}}" method="post">

        @csrf
        
            <table class="table">
                <tr>
                    <th>Kodas</th>
                    <td><input type="text" name="kodas" class="form-control @error('kodas') is-invalid @enderror" value="{{old('kodas')}}" placeholder="Kodas">
                                    @error('kodas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                    </td>
                </tr>
                <tr>
                    <th>Barkodas</th>
                    <td><input type="text" name="barkodas" class="form-control @error('barkodas') is-invalid @enderror" value="{{old('barkodas')}}" placeholder="Barkodas">
                                    @error('barkodas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                    </td>
                </tr>
                <tr>
                    <th>Pavadinimas</th>
                    <td><input type="text" name="pavadinimas" class="form-control @error('pavadinimas') is-invalid @enderror" value="{{old('pavadinimas')}}" placeholder="Pavadinimas">
                                    @error('pavadinimas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                    </td>
                </tr>
               <input  type="hidden" name="likutis" class="form-control @error('likutis') is-invalid @enderror" value="{{old('likutis')}}" placeholder="Likutis">
                                    @error('likutis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                    
                <tr>
                    <th>Vnt. svoris (kg) </th>
                    <td><input type="text" name="svoris" class="form-control @error('svoris') is-invalid @enderror" value="{{old('svoris')}}" placeholder="Vnt. svoris (kg)">
                                    @error('svoris')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                    </td>
                </tr>
                <tr>
                    <th>Vnt. dėžėje</th>
                    <td><input type="text" name="vnt_dezeje" class="form-control @error('vnt_dezeje') is-invalid @enderror" value="{{old('vnt_dezeje')}}" placeholder="Vnt. dėžėje">
                                    @error('vnt_dezeje')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                    </td>
                </tr>
                <tr>
                    <th>Gamintojas</th>
                    <td>
                    
                        <select name="gamintojas" id="gamintojas" class="form-control @error('gamintojas') is-invalid @enderror" value="{{old('gamintojas')}}" placeholder="Vnt. dėžėje">
                                <option value="{{$invoice -> manufacturer_id}}"> {{$invoice -> invoiceManufacturer -> manufacturer}}</option> 
                        </select>
  
                                    @error('gamintojas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                    </td>
                </tr>
                <tr>
                    <th>Tipas</th>
                    <td><input type="text" name="tipas" class="form-control @error('tipas') is-invalid @enderror" value="{{old('tipas')}}" placeholder="Tipas">
                                    @error('tipas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                    </td>
                </tr>
                <tr>
                    <th>Vieta sandėlyje</th>
                    <td><input type="text" name="vieta_sandelyje" class="form-control @error('vieta_sandelyje') is-invalid @enderror" value="{{old('vieta_sandelyje')}}" placeholder="Sekcija">
                        <input type="text" name="vieta_sandelyje" class="form-control @error('vieta_sandelyje') is-invalid @enderror" value="{{old('vieta_sandelyje')}}" placeholder="Vieta">
                        <input type="text" name="vieta_sandelyje" class="form-control @error('vieta_sandelyje') is-invalid @enderror" value="{{old('vieta_sandelyje')}}" placeholder="Aukštas">
                                    @error('vieta_sandelyje')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                    </td>
                </tr>
                <tr>
                    <th>Veiksmai</th>
                    <td><button class="btn btn-primary" type="submit">Įrašyti prekę</button></td>
                </tr>
                
            </table>
    </form>
    </div>
</div>  
                      
</div>

@endsection