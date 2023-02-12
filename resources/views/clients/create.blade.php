@extends('layouts.app')
@section('content')

<div class="container">
    <div class="col-6">
        <div class="head">
                <h3><i class="fa-solid fa-user-plus"></i> Kliento kūrimas</h3>
                <a class="btn btn-primary" href="{{route('clients.index')}}"><i class="fa-solid fa-circle-chevron-left"></i> Grįžti į klientų sąrašą</a>
        </div>
        <div class="form">
            <form action="{{route('clients.store')}}" method="post">

                @csrf
                
                    <table class="table">
                        <tr>
                            <th>Kliento įm. kodas</th>
                            <td><input type="text" name="im_kodas" class="form-control @error('im_kodas') is-invalid @enderror" value="{{old('im_kodas')}}" placeholder="Įmonės kodas">
                                    @error('im_kodas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </td>
                                    
                        </tr>
                        <tr>
                            <th>Klientas</th>
                            <td><input type="text" name="klientas" class="form-control @error('klientas') is-invalid @enderror" value="{{old('klientas')}}" placeholder="Įmonės pavadinimas">
                                    @error('klientas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </td>
                        </tr>
                        <tr>
                            <th>Adresas</th>
                            <td><input type="text" name="adresas" class="form-control @error('adresas') is-invalid @enderror" value="{{old('adresas')}}" placeholder="Adresas g. x - x">
                                    @error('adresas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </td>
                        </tr>
                        <tr>
                            <th>Miestas</th>
                            <td><input type="text" name="miestas" class="form-control @error('miestas') is-invalid @enderror" value="{{old('miestas')}}" placeholder="Miestas">
                                    @error('miestas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </td>
                        </tr>
                        <tr>
                            <th>Pašto kodas</th>
                            <td><input type="text" name="pasto_kodas" class="form-control @error('pasto_kodas') is-invalid @enderror" value="{{old('pasto_kodas')}}" placeholder="12345">
                                    @error('pasto_kodas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </td>
                        </tr>
                        <tr>
                            <th>Mobilus telefono nr.</th>
                            <td><input type="text" name="telefonas" class="form-control @error('telefonas') is-invalid @enderror" value="{{old('telefonas')}}" placeholder="Pvz. 370xxxxxxxx">
                                @error('telefonas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                        </td>
                        </tr>
                        <tr>
                            <th>Elektroninis paštas</th>
                            <td><input type="text" name="el_pastas" class="form-control @error('el_pastas') is-invalid @enderror" value="{{old('el_pastas')}}" placeholder="El. paštas">
                                    @error('el_pastas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                        </td>
                        </tr>
                        <tr>
                            <th>Veiksmai</th>
                            <td><button class="btn btn-primary" type="submit"><i class="fa-solid fa-floppy-disk"></i> Įrašyti klientą</button></td>
                        </tr>
                        
                    </table>
            </form>
        </div>  
    </div>     
</div>

@endsection