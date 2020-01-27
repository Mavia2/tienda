@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">You are logged in!</div>

                <div class="panel-body">
                  <table class="table">
                      <th>Id</th>
                      <th>Nombre</th>
                      <th>Email</th>
                    @foreach ($user as $bor)  
                      <tr>
                         <td>{{$bor->id}}</td>
                         <td>{{$bor->name}}</td> 
                         <td>{{$bor->email}}</td>  
                      </tr>
                     @endforeach
                  </table>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
