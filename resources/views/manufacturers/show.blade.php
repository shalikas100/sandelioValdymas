@extends('layouts.app')
@section('content')


<div class="container">
    <div class="col-5">
        <div class="head">
            <h3><i class="fa-solid fa-circle-info"></i> Informacija</h3>
            <a class="btn btn-primary" href="{{route('manufacturers.index')}}"><i class="fa-solid fa-circle-chevron-left"></i> Grįžti į gamintojų sąrašą</a>
        </div>
        
        <table class="table">
            <tr>
                <th>Gamintojo ID</th>
                <td>{{str_pad($manufacturer -> id, 6, 'GAM00', STR_PAD_LEFT)}}</td>
            </tr>
            <tr>
                <th>Gamintojas</th>
                <td>{{$manufacturer -> manufacturer}}</td>
            </tr>
            <tr>
                <th>Veiksmai</th>
                <td><a class="btn btn-primary" href="{{route('manufacturers.edit', $manufacturer)}}"><i class="fa-solid fa-pencil"></i> Redaguoti duomenis</a></td>   
            </tr>
        </table>
    </div>
</div>
@endsection