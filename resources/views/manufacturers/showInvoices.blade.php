@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row" style="display:flex; justify-content: space-between;">
        <h3>Gamintojo "{{$manufacturer -> manufacturer}}"" atlikti pajamavimai</h3>
        <a class="btn btn-primary" href="{{route('manufacturers.index')}}"><i class="fa-solid fa-circle-chevron-left"></i> Grįžti į gamintojų sąrašą</a>
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
            <td><a class="btn btn-light" href="{{route('invoiceDetails.show',$invoice)}}">{{$invoice -> invoiceInvoiceDetails -> count()}}</a></td>
            <td>
                <form action="{{route('invoices.destroy', $invoice)}}" method="post">
                    @csrf
                    <button class="btn btn-danger"><i class="fa-solid fa-trash"></i> Ištrinti pajamavimą</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>

@endsection