@extends('layouts.app')
@section('content')

<div class="container">
    <div class="col-8">
        <div class="head">
            <h3>Kliento redagavimas</h3>
                <form action="{{route('clients.destroy', $client)}}" method="post">
                    @csrf
                    <button class="btn btn-danger">Ištrinti klientą</button>
                </form>
            <a class="btn btn-primary" href="{{route('clients.index')}}">Grįžti į klientų sąrašą</a>
        </div>
        <div class="form">
            <form action="{{route('clients.update', $client)}}" method="post">
                @csrf
                    <table class="table">
                        <tr>
                            <th>Kliento įm. kodas</th>
                            <td><input type="text" name="im_kodas" class="form-control @error('im_kodas') is-invalid @enderror" value="{{old('im_kodas') ?? $client -> im_kodas}}">
                                @error('im_kodas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </td>             
                        </tr>
                        <tr>
                            <th>Klientas</th>
                            <td><input type="text" name="klientas" class="form-control @error('klientas') is-invalid @enderror" value="{{old('klientas') ?? $client -> klientas}}">
                                @error('klientas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </td>             
                        </tr>
                        <tr>
                            <th>Adresas</th>
                            <td><input type="text" name="adresas" class="form-control @error('adresas') is-invalid @enderror" value="{{old('adresas') ?? $client -> adresas}}">
                                @error('adresas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </td>                                   
                        </tr>
                        <tr>
                            <th>Miestas</th>
                            <td><input type="text" name="miestas" class="form-control @error('miestas') is-invalid @enderror" value="{{old('miestas') ?? $client -> miestas}}">
                                    @error('miestas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </td>               
                        </tr>
                        <tr>
                            <th>Pašto kodas</th>
                            <td><input type="text" name="pasto_kodas" class="form-control @error('pasto_kodas') is-invalid @enderror" value="{{old('pasto_kodas') ?? $client -> pasto_kodas}}">
                                    @error('pasto_kodas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </td>
                                    
                        </tr>
                        <tr>
                            <th>Telefono nr.</th>
                            <td><input type="text" name="telefonas" class="form-control @error('telefonas') is-invalid @enderror" value="{{old('telefonas') ?? $client -> telefonas}}">
                                    @error('telefonas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </td>               
                        </tr>
                        <tr>
                            <th>Elektroninis paštas</th>
                            <td><input type="text" name="el_pastas" class="form-control @error('el_pastas') is-invalid @enderror" value="{{old('el_pastas') ?? $client -> el_pastas}}">
                                    @error('el_pastas')
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
