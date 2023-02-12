@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
<h3>Vartotojai</h3>
    </div>
    <div class="row">
        <div class="table">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Sukurtas</th>
                        <th>Veiksmai</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user -> id}}</td>
                        <td>{{$user -> name}}</td>
                        <td>{{$user -> email}}</td>
                        <td>{{$user -> created_at}}</td>
                        <td><a class="btn btn-primary" href="">Veiksmas 1</a></td>
                        <td><a class="btn btn-primary" href="">Veiksmas 2</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection