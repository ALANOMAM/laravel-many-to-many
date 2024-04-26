@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <h1>PAGINA CREATE DEI POST</h1>

        <!--indichiamo anche il metodo POST per la richesta-->
        <form action="{{ route('admin.posts.store')}}" method="POST"  enctype="multipart/form-data" {{--questo pezzo "enctype" l'ho aggiunto per via dell'immagine--}} >
            @csrf

          <div class="mb-3">
            <label for="Nome" class="form-label"><strong>Nome File</strong></label>
            <input type="text" class="form-control @error('Nome') is-invalid @enderror" id="Nome" name="Nome" value="{{old('Nome')}}" required>
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
            {{--il pezzo "{{$type->id == old('type_id') ? 'selected' : '' }" mi fa mantenere il 
            valore selezionato prima in questa parte del form se l'errore mi proviene da un'altra 
            parte del form e che mi si refresha la pagina--}}
            <option value="{{$type->id}}" {{$type->id == old('type_id') ? 'selected' : '' }}>{{$type->title}}</option>
            @endforeach
          </select>
      
      </div>
       <!--parte che rigiarda i tipi end-->



          <div class="mb-3">
              <label for="Descrizione" class="form-label"><strong>Descrizione</strong></label>
              <textarea type="text" class="form-control @error('Descrizione') is-invalid @enderror" id="Descrizione" name="Descrizione" required>{{old('Descrizione')}}</textarea>   
              @error('Descrizione') 
               <div class="invalid-feedback">
                {{$message}} 
               </div>
               @enderror
            </div>


            <div class="mb-3">
              <label for="Immagine_di_copertina" class="form-label"><strong>Url immagime </strong></label>
              <!--l'input dell'immagine deve essere di tipo "file" cosi posso selzezionare files nel mio pc-->
              <input type="file" class="form-control" id="Immagine_di_copertina" name="Immagine_di_copertina">  
            </div>
            
            

            <div class="mb-3 d-flex">
               {{--@dump($technologies)--}}
               <label class="mb-2" for=""> <strong>Technology</strong></label>
               @foreach($technologies as $technology)
               <div class="form-check">
                {{--"id" e "for" in questo caso ci permettono solo di collegare la label alla checkbox in modo
                tale che posso evidenziiare la casella sia cliccando direttamente su di essa che cliccando sul nome --}}
                <input 
                type="checkbox" 
                name="technologies[]" 
                value="{{$technology->id}}" 
                id="{{$technology->id}}"
                {{--la riga sotto mi mantiene i vecchi checked checked se qualcosa va storto nel form--}}
                {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}
                >
                <label for="{{$technology->id}}">{{$technology->titolo}}</label>
               </div>
               @endforeach

            </div>

            <div class="mb-3">
              <label for="Link_repo_GitHub" class="form-label"><strong>Link Per GitHub</strong></label>
              <input type="string" class="form-control" id="Link_repo_GitHub" name="Link_repo_GitHub" value="{{old('Link_repo_GitHub')}}">
            </div>

            
         
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
  




</div>
@endsection