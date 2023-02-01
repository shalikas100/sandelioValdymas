@extends('layouts.app')
@section('content')

<div class="container">
    <div class="col-6">
        <div class="head">
                <h3>Gamintojo kūrimas</h3>
                <a class="btn btn-primary" href="{{route('manufacturers.index')}}">Grįžti į gamintojų sąrašą</a>
        </div>
        <div class="form">
            <form action="{{route('manufacturers.store')}}" method="post">

                @csrf
                
                    <table class="table">
                        <tr>
                            <th>Gamintojas</th>
                            <td><input type="text" name="manufacturer" class="form-control @error('manufacturer') is-invalid @enderror" value="{{old('manufacturer')}}" placeholder="Gamintojo pavadinimas">
                                    @error('manufacturer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </td>
                        </tr>
                        <tr>
                            <th>Veiksmai</th>
                            <td><button class="btn btn-primary" type="submit">Sukurti gamintoją</button></td>
                        </tr>
                        
                    </table>
            </form>
        </div>  
    </div>     
</div>

@endsection