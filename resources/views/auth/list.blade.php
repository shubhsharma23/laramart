@extends('layouts.app')  
@section('content')
<div class="container">
    <ul>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                </tr>
            </thead>
            @foreach ($data as $d)
            <tbody>
              <tr>
                <th scope="row">{{$d->id}}</th>
                <td>{{$d->name}}</td>
                <td>{{$d->email}}</td>
                <td>{{$d->phone}}</td>
              </tr>
            </tbody>
            @endforeach
          </table>
    </ul>
        <div>{{ $data->links()}}</div>
        
    </div>

    
@endsection



