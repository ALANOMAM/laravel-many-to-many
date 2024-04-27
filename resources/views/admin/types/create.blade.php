@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <h1>PAGINA CREATE DEI TIPI</h1>

        <!--indichiamo anche il metodo POST per la richesta-->
        <form action="{{ route('admin.types.store')}}" method="POST" >
            @csrf

          <div class="mb-3">
            <label for="title" class="form-label"><strong>Nome Tipo</strong></label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title')}}">
            @error('title') 
               <div class="invalid-feedback">
                {{$message}} 
               </div>
               @enderror
          </div>
          

          <div class="mb-3">
              <label for="description" class="form-label"><strong>Descrizione Tipo</strong></label>
              <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" required>{{old('description')}}</textarea>   
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