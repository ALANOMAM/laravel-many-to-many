<!--QUESTA PAGINA E COLLEGATA ALLA ROTTA E AL DASHBOARD CONTROLLER. 
    E QUELLA CHE POSSO USARE PER CREARE UNA LISTA DEGLI UTENTI ADMIN-->

@extends('layouts.app')

@section('content')

<div class="container py-5">

    <h1>Tutti gli utenti admin</h1>
      {{--@dd($user)--}}
 
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">email</th>
            <th scope="col">created_at</th>
            <th scope="col">updated_at</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->created_at}}</td>
            <td>{{$user->updated_at}}</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>***</td>
            <td>***</td>
            <td>***</td>
            <td>***</td>
          </tr>
          
        </tbody>
      </table>
         
</div>

@endsection