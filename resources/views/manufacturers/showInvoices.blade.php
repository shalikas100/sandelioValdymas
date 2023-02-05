@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h3>Gamintojo {{$manufacturer -> manufacturer}} atlikti pajamavimai</h3>
    </div>
    <div class="row">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Pajamavimo Nr.</th>
            <th>Sukūrimo data</th>
            <th>Pozicijų kiekis</th>
            <th>Veiksmai</th>
        </tr>
        </thead>
        <tbody>
        @foreach($invoices as $invoice)
        <tr>
            <td>{{str_pad($invoice -> id, 7, 'PAJ000', STR_PAD_LEFT)}}</td>
            <td>{{$invoice -> created_at}}</td>
            <td><a class="btn btn-light" href="{{route('invoices.show', $invoice)}}">{{$invoice -> invoiceInvoiceDetails -> count()}}</a></td>
            <td>
                <form action="{{route('invoices.destroy', $invoice)}}" method="post">
                    @csrf
                    <button class="btn btn-danger">Ištrinti pajamavimą</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>

@endsection