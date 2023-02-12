@extends('layouts.app')
@section('content')

<div class="container">
    <div class="col-8">
        <div class="head">
            <h3><i class="fa-solid fa-pencil"></i> Gamintojo redagavimas</h3>
                <form action="{{route('manufacturers.destroy', $manufacturer)}}" method="post">
                    @csrf
                    <button class="btn btn-danger"><i class="fa-solid fa-trash"></i> Ištrinti gamintoją</button>
                </form>
            <a class="btn btn-primary" href="{{route('manufacturers.index')}}"><i class="fa-solid fa-circle-chevron-left"></i> Grįžti į gamintojų sąrašą</a>
        </div>
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
        <div class="form">
            <form action="{{route('manufacturers.update', $manufacturer)}}" method="post">
                @csrf
                    <table class="table">
                        <tr>
                            <th>Gamintojas</th>
                            <td><input type="text" name="manufacturer" class="form-control @error('manufacturer') is-invalid @enderror" value="{{old('manufacturer') ?? $manufacturer -> manufacturer}}">
                                @error('manufacturer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </td>             
                        </tr>
                        <tr>
                            <th>Veiksmai</th>
                            <td><button class="btn btn-primary" type="submit"><i class="fa-solid fa-floppy-disk"></i> Išsaugoti pakeitimus</button>
                            </td>
                        </tr>
                    </table>
            </form>
        </div>
    </div>        
</div>

@endsection
