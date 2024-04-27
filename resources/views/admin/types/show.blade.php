@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <h1>PAGINA SHOW DEI TIPI</h1>
  
 
 <!--contenitore  info sui tipi start-->   
  <div class="post-info d-flex gap-4">
    <ul class="list-group">
      <li class="list-group-item"><span><strong>Nome Tipo : </strong></span>{{$type->title}}</li>
      <li class="list-group-item"><span><strong>Desrizione Tipo : </strong></span>{{$type->description}}</li>
    </ul>
  </div>
<!--contenitore info sui tipi end-->
      
 
    <!--contenitore pulsanti start-->
    <div class="py-5 d-flex gap-4">
      <!--pulsante di modifica-->
     <a href="{{route('admin.types.edit', $type->id)}}" class="btn btn-warning">Modifica</a>
      
     <!--il moi pulsante per l'eliminazione deve essere dentro un mini form-->
    <form action="{{route('admin.types.destroy', $type->id)}}" method="POST">
   <!--serve questo commando -->
   @csrf
   <!--serve questo commando -->
   @method("DELETE")
   <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"> Elimina</button>
  </form>
   </div> 
<!--contenitore pulsanti end-->


</div>
@endsection