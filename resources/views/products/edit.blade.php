@extends('layouts.app')
@section('content')

<div class="container">
<div class="col-6">
<div class="head">
                <h3>Prekės redagavimas</h3>
                <form action="{{route('products.destroy', $product)}}" method="post">
                    @csrf
                    <button class="btn btn-danger">Ištrinti prekę</button>
                </form>
                
                <a class="btn btn-primary" href="{{route('products.index')}}">Grįžti į prekių sąrašą</a>
        </div>
    <div class="form">
    <form action="{{route('products.update', $product)}}" method="post">

        @csrf
        
            <table class="table">
            <tr>
                    <th>Kodas</th>
                    <td><input type="text" name="kodas" class="form-control @error('kodas') is-invalid @enderror" value="{{old('kodas') ?? $product -> kodas}}" placeholder="Adresas g. x - x">
                                    @error('kodas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                    </td>
                </tr>
                <tr>
                    <th>Barkodas</th>
                    <td><input type="text" name="barkodas" class="form-control @error('barkodas') is-invalid @enderror" value="{{old('barkodas') ?? $product -> barkodas}}" placeholder="Adresas g. x - x">
                                    @error('barkodas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                    </td>
                </tr>
                <tr>
                    <th>Pavadinimas</th>
                    <td><input type="text" name="pavadinimas" class="form-control @error('pavadinimas') is-invalid @enderror" value="{{old('pavadinimas') ?? $product -> pavadinimas}}" placeholder="Adresas g. x - x">
                                    @error('pavadinimas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                    </td>
                </tr>
                <tr>
                    <th>Likutis</th>
                    <td><input type="text" name="likutis" class="form-control @error('likutis') is-invalid @enderror" value="{{old('likutis') ?? $product -> likutis}}" placeholder="Adresas g. x - x">
                                    @error('likutis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                    </td>
                </tr>
                <tr>
                    <th>Vnt. svoris (kg) </th>
                    <td><input type="text" name="svoris" class="form-control @error('svoris') is-invalid @enderror" value="{{old('svoris') ?? $product -> svoris}}" placeholder="Adresas g. x - x">
                                    @error('svoris')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                    </td>
                </tr>
                <tr>
                    <th>Vnt. dėžėje</th>
                    <td><input type="text" name="vnt_dezeje" class="form-control @error('vnt_dezeje') is-invalid @enderror" value="{{old('vnt_dezeje') ?? $product -> vnt_dezeje}}" placeholder="Adresas g. x - x">
                                    @error('vnt_dezeje')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                    </td>
                </tr>
                <tr>
                    <th>Gamintojas</th>
                    <td><input type="text" name="gamintojas" class="form-control @error('gamintojas') is-invalid @enderror" value="{{old('gamintojas') ?? $product -> gamintojas}}" placeholder="Adresas g. x - x">
                                    @error('gamintojas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                    </td>
                </tr>
                <tr>
                    <th>Tipas</th>
                    <td><input type="text" name="tipas" class="form-control @error('tipas') is-invalid @enderror" value="{{old('tipas') ?? $product -> tipas}}" placeholder="Adresas g. x - x">
                                    @error('tipas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                    </td>
                </tr>
                <tr>
                    <th>Vieta sandėlyje</th>
                    <td><input type="text" name="vieta_sandelyje" class="form-control @error('vieta_sandelyje') is-invalid @enderror" value="{{old('vieta_sandelyje') ?? $product -> vieta_sandelyje}}" placeholder="Adresas g. x - x">
                                    @error('vieta_sandelyje')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                    </td>
                </tr>
                <tr>
                    <th>Veiksmai</th>
                    <td><button class="btn btn-primary" type="submit">Išsaugoti pakeitimus</button>
                    </td>
                </tr>
                
            </table>
    </form>
    </div>
</div>         
</div>

@endsection