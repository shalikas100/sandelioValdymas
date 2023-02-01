@extends('layouts.app')
@section('content')

<div class="container">
    <div class="col-8">
    <div class="row">
            <h3>Pajamavimo redagavimas</h3>
                <form action="{{route('invoices.destroy', $invoice)}}" method="post">
                    @csrf
                    <button class="btn btn-danger">Ištrinti pajamavimą</button>
                </form>
            <a class="btn btn-primary" href="{{route('invoices.index')}}">Grįžti į pajamavimų sąrašą</a>
    </div>
    <div class="row">
    <form class="form" action="{{route('invoices.update', $invoice)}}" method="post">
            @csrf
            <div class="form-group">
                <table class="table">
                    <tr>
                        <th>Redaguoti gamintoją</th>
                        <td><select name="manufacturer_id" id="manufacturer_id" class="form-control @error('manufacturer_id') is-invalid @enderror"> 
                            <option value="{{$invoice -> manufacturer_id}}">{{$invoice -> invoiceManufacturer -> manufacturer}}</option>
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
                        <th>Veiksmai</th>
                        <td>
                            <button class="btn btn-primary" type="submit">Išsaugoti pakeitimus</button>
                        </td>
                    </tr>
                </table>
            </div>     
        </form>
        </div>
    </div>
</div>

@endsection