@extends('layouts.app')
@section('content')

<div class="container">
    <div class="col-8">
        <div class="head">
                <h3>Prekės redagavimas</h3>
                <form action="{{route('products.destroy', $product)}}" method="post">
                    @csrf
                    <button class="btn btn-danger"><i class="fa-solid fa-trash"></i> Ištrinti prekę</button>
                </form>
                
                <a class="btn btn-primary" href="{{route('products.index')}}"><i class="fa-solid fa-circle-chevron-left"></i> Grįžti į prekių sąrašą</a>
        </div>
    <div class="form">
    <form action="{{route('products.update', $product)}}" method="post">

        @csrf
        
            <table class="table">
            <tr>
                    <th>Kodas</th>
                    <td><input type="text" name="kodas" class="form-control @error('kodas') is-invalid @enderror" value="{{old('kodas') ?? $product -> kodas}}" placeholder="Kodas">
                                    @error('kodas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                    </td>
                </tr>
                <tr>
                    <th>Barkodas</th>
                    <td><input type="text" name="barkodas" class="form-control @error('barkodas') is-invalid @enderror" value="{{old('barkodas') ?? $product -> barkodas}}" placeholder="Barkodas">
                                    @error('barkodas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                    </td>
                </tr>
                <tr>
                    <th>Pavadinimas</th>
                    <td><input type="text" name="pavadinimas" class="form-control @error('pavadinimas') is-invalid @enderror" value="{{old('pavadinimas') ?? $product -> pavadinimas}}" placeholder="Pavadinimas">
                                    @error('pavadinimas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                    </td>
                </tr>
                
                    <!-- <th>Likutis</th> -->
                    <input type="hidden" name="likutis" class="form-control @error('likutis') is-invalid @enderror" value="{{old('likutis') ?? $product -> likutis}}" placeholder="Likutis">
                                    @error('likutis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                    
                
                <tr>
                    <th>Vnt. svoris (kg) </th>
                    <td><input type="text" name="svoris" class="form-control @error('svoris') is-invalid @enderror" value="{{old('svoris') ?? $product -> svoris}}" placeholder="Svoris">
                                    @error('svoris')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                    </td>
                </tr>
                <tr>
                    <th>Vnt. pakuotėje</th>
                    <td><input type="text" name="vnt_dezeje" class="form-control @error('vnt_dezeje') is-invalid @enderror" value="{{old('vnt_dezeje') ?? $product -> vnt_dezeje}}" placeholder="Vnt. pakuotėje">
                                    @error('vnt_dezeje')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                    </td>
                </tr>
                <tr>
                    <!-- <th>Gamintojas</th> -->
                    <input type="hidden" name="gamintojas" class="form-control @error('gamintojas') is-invalid @enderror" value="{{old('gamintojas') ?? $product -> gamintojas}}" placeholder="Gamintojas">
                                    @error('gamintojas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                    
                </tr>
                <tr>
                    <th>Tipas</th>
                    <td><input type="text" name="tipas" class="form-control @error('tipas') is-invalid @enderror" value="{{old('tipas') ?? $product -> tipas}}" placeholder="Tipas">
                                    @error('tipas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                    </td>
                </tr>
                <tr>
                    <th>Vieta sandėlyje</th>
                    <td>
                        <select class="form-control" name="vieta_sandelyje" id="" class="form-control @error('tipas') is-invalid @enderror">
                                <option value="{{$product -> vieta_sandelyje}}">{{$product -> productLocations -> sekcija_vieta_aukstas}}</option>
                                @foreach($locations as $location)
                                <option value="{{$location -> id}}">{{$location -> sekcija_vieta_aukstas}}</option>
                                @endforeach
                        </select>
                                    @error('vieta_sandelyje')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                    </td>
                </tr>
                <tr>
                    <th>Veiksmai</th>
                    <td><button class="btn btn-primary" type="submit"><i class="fa-solid fa-floppy-disk"></i> Išsaugoti pakeitimus</button>
                    </td>
                </tr>
                
            </table>
    </form>
    </div>
    </div>         
</div>

@endsection