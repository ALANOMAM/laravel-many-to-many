@extends('layouts.admin')

@section('content')
<div class="container py-5">
  <h1>PAGINA EDIT DEI POST</h1>

        <form action="{{ route('admin.posts.update', $post->id)}}" method="POST" enctype="multipart/form-data" {{--questo pezzo "enctype" l'ho aggiunto per via dell'immagine--}} >

            @csrf
            
            @method("PUT")

          
          
          <div class="mb-3">
            <label for="Nome" class="form-label"><strong>Nome File</strong></label>
            <input type="text" class="form-control @error('Nome') is-invalid @enderror" id="Nome" name="Nome" value="{{old('Nome')??$post->Nome}}" required>
            @error('Nome') 
            <div class="invalid-feedback">
             {{$message}} 
            </div>
            @enderror
          </div>
          
     
           <!--parte che rigiarda i tipi start-->
       <div class="mb-3">
        <label for="type_id" class="form-label"><strong>Tipi</strong></label>
        {{--@dump($types)--}}
        
          <select class="form-select" name="type_id" id="type_id">
            <option value=""></option>
            @foreach($types as $type)
            {{-- la parte "{{$type->id == $post->type_id ? 'selected' : '' }}" aggiunge "selected" mia 
            opzione se soddisfa la condizione, con l'aggiunta della parola "selectied" ad una opzione 
            mi restituisce il valore presente nell'opzione--}}
            <option value="{{$type->id}}" {{$type->id == $post->type_id ? 'selected' : '' }}>{{$type->title}}</option>
            @endforeach
          </select>
      
      </div>
       <!--parte che rigiarda i tipi end-->




          <div class="mb-3">
              <label for="Descrizione" class="form-label"><strong>Descrizione</strong></label>
              <textarea type="text" class="form-control @error('Descrizione') is-invalid @enderror" id="Descrizione" name="Descrizione" required>{{old('Descrizione')??$post->Descrizione}}</textarea>   
              @error('Descrizione') 
              <div class="invalid-feedback">
               {{$message}} 
              </div>
              @enderror
            </div>


            <div class="mb-3">
              <div>
                <label for="Immagine_di_copertina" class="form-label"><strong>Immagine Di Copertina</strong></label>
              </div>
              <img class="mb-2" src="{{asset('storage/'.$post->Immagine_di_copertina)}}" alt="">
              <input type="file" class="form-control" id="Immagine_di_copertina" name="Immagine_di_copertina">
            </div>
            
            

            <div class="mb-3">
              <label for="Tecnologie_utilizzate" class="form-label"><strong>Tecnologie Utilizzate</strong></label>
              <input type="string" class="form-control" id="Tecnologie_utilizzate" name="Tecnologie_utilizzate" value="{{old('Tecnologie_utilizzate')??$post->Tecnologie_utilizzate}}">
            </div>

            <div class="mb-3">
              <label for="Link_repo_GitHub" class="form-label"><strong>Link Per GitHub</strong></label>
              <input type="string" class="form-control" id="Link_repo_GitHub" name="Link_repo_GitHub" value="{{old('Link_repo_GitHub')??$post->Link_repo_GitHub}}">
            </div>




          
            
         
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>

</div>
@endsection
