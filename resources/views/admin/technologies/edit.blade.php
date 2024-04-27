@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <h1>PAGINA EDIT DELLE TECHNOLOGIE</h1>

        <!--indichiamo anche il metodo POST per la richesta-->
        <form action="{{ route('admin.technologies.update',$technology->id)}}" method="POST" >
            @csrf

            @method("PUT")

          <div class="mb-3">
            <label for="titolo" class="form-label"><strong>Nome Tecnologia</strong></label>
            <input type="text" class="form-control @error('titolo') is-invalid @enderror" id="titolo" name="titolo" value="{{old('titolo')??$technology->titolo}}">
            @error('titolo') 
               <div class="invalid-feedback">
                {{$message}} 
               </div>
               @enderror
          </div>
          

          <div class="mb-3">
              <label for="colore" class="form-label"><strong>Colore Tecnologia</strong></label>
              <textarea type="text" class="form-control @error('colore') is-invalid @enderror" id="colore" name="colore" required>{{old('colore')??$technology->colore}}</textarea>   
              @error('colore') 
               <div class="invalid-feedback">
                {{$message}} 
               </div>
               @enderror
            </div>

            
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
  




</div>
@endsection