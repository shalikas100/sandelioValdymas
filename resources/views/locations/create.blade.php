@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <h3><i class="fa-solid fa-plus"></i> <i class="fa-solid fa-thumbtack"></i> Vietos kūrimas</h3>
    </div>
    <div class="row">
        <form method="post" action="{{route('locations.store')}}">
            @csrf
            <div class="row">
            <select class="form-control" name="sekcija_vieta_aukstas" id="">
                <option selected disabled  value="">Pasirinkite sekciją</option>
                    @foreach($sections as $key => $section)
                        @foreach($places as $key => $place)
                            @foreach($floors as $key => $floor)
                                <option value="{{$section}}-{{$place}}-{{$floor}}">{{$section}}-{{$place}}-{{$floor}}</option>
                            @endforeach
                         @endforeach
                    @endforeach
            </select>
            </div>
            <div class="row">
            <button class="btn btn-primary" type="submit">Sukurti</button>
            </div>
        </form>
    </div>
    <!-- <div class="row">
        <div class="table">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Sekcija - Vieta - Aukštas </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($sections as $section)
                    @foreach($places as $place)
                    @foreach($floors as $floor)
                    <tr>
                    
                        <td>{{$section}}-{{$place}}-{{$floor}}</td>
                    
                    </tr>
                    @endforeach
                    @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> -->
</div>

@endsection