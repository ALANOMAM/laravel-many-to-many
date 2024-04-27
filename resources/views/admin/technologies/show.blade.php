@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <h1>PAGINA SHOW DELLE TECNOLOGIE</h1>
  
 
 <!--contenitore  info sui tipi start-->   
  <div class="post-info d-flex gap-4">
    <ul class="list-group">
      <li class="list-group-item"><span><strong>Nome Tecnologia : </strong></span>{{$technology->titolo}}</li>
      <li class="list-group-item"><span><strong>Colore Tecnologia : </strong></span>{{$technology->colore}}</li>
    </ul>
  </div>
<!--contenitore info sui tipi end-->
      
 
    <!--contenitore pulsanti start-->
   <div class="py-5 d-flex gap-4">
      <!--pulsante di modifica-->
     <a href="{{route('admin.technologies.edit', $technology->id)}}" class="btn btn-warning">Modifica</a>
      
     <!--il moi pulsante per l'eliminazione deve essere dentro un mini form-->
    <form action="{{route('admin.technologies.destroy', $technology->id)}}" method="POST">
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