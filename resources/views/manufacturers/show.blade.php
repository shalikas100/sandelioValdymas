@extends('layouts.app')
@section('content')


<div class="container">
    <div class="col-5">
        <div class="head">
            <h3>Informacija</h3>
            <a class="btn btn-primary" href="{{route('manufacturers.index')}}">Grįžti į gamintojų sąrašą</a>
        </div>
        
        <table class="table">
            <tr>
                <th>Gamintojas</th>
                <td>{{$manufacturer -> manufacturer}}</td>
            </tr>
            <tr>
                <th>Veiksmai</th>
                <td><a class="btn btn-primary" href="{{route('manufacturers.edit', $manufacturer)}}">Redaguoti duomenis</a></td>   
            </tr>
        </table>
    </div>
</div>
@endsection