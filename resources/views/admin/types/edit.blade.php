@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <h1>PAGINA EDIT DEI TIPI</h1>

        <!--indichiamo anche il metodo POST per la richesta-->
        <form action="{{ route('admin.types.update',$type->id)}}" method="POST" >
            @csrf

            @method("PUT")
            
          <div class="mb-3">
            <label for="title" class="form-label"><strong>Nome Tipo</strong></label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title')??$type->title}}">
            @error('title') 
               <div class="invalid-feedback">
                {{$message}} 
               </div>
               @enderror
          </div>
          

          <div class="mb-3">
              <label for="description" class="form-label"><strong>Descrizione Tipo</strong></label>
              <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" required>{{old('description')??$type->description}}</textarea>   
              @error('description') 
               <div class="invalid-feedback">
                {{$message}} 
               </div>
               @enderror
            </div>

            
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
  




</div>
@endsection