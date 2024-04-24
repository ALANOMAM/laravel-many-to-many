@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <h1>PAGINA INDEX DEI TIPI</h1>
    {{---@dd($types)---}}


   <table class="table">
    <thead>
      <tr>
        <th scope="col">Nomi Tipi</th>
        <th scope="col">Descrizione Tipi</th>
      </tr>
    </thead>

    <tbody>
       
       @foreach ($types as $type)
        <tr>      
        <td>{{$type->id}} - {{$type->title}}</td>
        <td>{{$type->description}}</td>
        <td><a class="btn btn-success" href="{{route('admin.types.show' , $type->id )}}">visualizza tipo</a></td>
       </tr>
        @endforeach 
        
    </tbody>
  </table>

  <a href="{{route('admin.posts.create')}}" class="btn btn-primary">Aggiungi tipo</a>
 
</div>
@endsection