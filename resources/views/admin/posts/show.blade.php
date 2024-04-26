@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <h1>PAGINA SHOW DEI POSTS</h1>
  
 

 <!--contenitore immagine e info start-->   
  <div class="post-info d-flex gap-4">
    <!--per visualizzare la nostra immagine dobbiamo seguire questo percorso -->
    <img src="{{asset('storage/'.$post->Immagine_di_copertina)}}" alt=""> 

     

    <ul class="list-group container">
      <li class="list-group-item"><span><strong>Nome File : </strong></span>{{$post->Nome}}</li>
      {{---{{$post->type?->title}} quetso pezzo di codice mi permette di avere accesso al titolo del tipo
      questa manovra va fatta in sintonia con quello che succede nel model "Post.php" appunto perche il
      "type" che vediamo scritto li è il nome che abbiamo dato alla FUNZIONE nel model "Post.php"--}}
      
      <li class="list-group-item"><span><strong>Tipo File : </strong></span>{{$post->type?->title}}</li>
      <li class="list-group-item"><span><strong>Descrizione File : </strong></span>{{$post->Descrizione}}</li>
      <li class="list-group-item"><span><strong>Tecnologie Utilizzate :</strong></span>
        
          @foreach ($post->technologies as $technology)
          <span class="badge rounded-pill" style="background-color:{{$technology->colore ?? 'grey'}}">{{$technology->titolo}}</span>
          @endforeach
        
      </li>

      <li class="list-group-item"><span><strong>Link GitHub : </strong></span><a href="{{$post->Link_repo_GitHub}}">{{$post->Link_repo_GitHub}}</a></li>
    </ul>
  </div>
<!--contenitore immagine e info end-->





      
 
    <!--contenitore pulsanti start-->
    <div class="py-5 d-flex gap-4">
      <!--pulsante di modifica-->
     <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-warning">Modifica</a>
      
     <!--il moi pulsante per l'eliminazione deve essere dentro un mini form-->
    <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST">
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
