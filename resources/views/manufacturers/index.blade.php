@extends('layouts.app')
@section('content')

<div class="container">
            @if(session('success_message'))
                <div class="alert alert-success">
                    {{ session('success_message')}}
                </div>
            @endif

            @if(session('danger_message'))
                <div class="alert alert-danger">
                    {{ session('danger_message')}}
                </div>
            @endif

            
            @if(isset($search))
            <div class="success">
                <p class="success">Paieškos rezultatas pagal raktažodį: {{$search}}</p>
            </div>
            @endif

    <div class="head">
        <h2>Gamintojai</h2>
        <a class="btn btn-primary" href="{{route('manufacturers.create')}}">Sukurti naują gamintoją</a>
    </div>
    <hr>
    <div class="row">
        <div class="col-4">
            <form id="searchAjax" url-manufacturers-ajax-action="{{route('manufacturers.searchAjax')}}">
                @csrf
                <input id="search_manufacturer" type="text" name="search" placeholder="Gamintojo paieška">
            </form>
        </div>
    </div>
    <div class="table">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Eil. Nr.</th>
                    <th>Gamintojas</th>
                    <th>Gamintojo ID</th>
                    <th>Kiek kartu pajamuota</th>
                    <th>Veiksmai</th>
                </tr>
            </thead>
            <tbody class="manufacturers">
            @foreach($manufacturers as $manufacturer)
                <tr>
                    <td>{{$loop -> iteration}}</td>
                    <td>{{$manufacturer -> manufacturer}}</td>
                    <th>{{$manufacturer -> id}}</th>
                    <td><a id="manufacturerInvoices_count" class="btn btn-light" href="{{route('manufacturers.showInvoices', $manufacturer)}}">{{$manufacturer -> manufacturerInvoice -> count()}}</a></td>
                    <td><a class="btn btn-primary" href="{{route('manufacturers.show', $manufacturer)}}">Rodyti</a></td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>
</div>

@endsection