@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <h1>PAGINA INDEX DELLE TECNOLOGIE</h1>
    {{---@dd($technologies)---}}


   <table class="table">
    <thead>
      <tr>
        <th scope="col">Nomi Tecnologie</th>
        <th scope="col">Colori Technologie</th>
      </tr>
    </thead>

    <tbody>
        
       @foreach ($technologies as $technology)
        <tr>      
        <td>{{$technology->id}} - {{$technology->titolo}}</td>
        <td>{{$technology->colore}}</td>
        <td><a class="btn btn-success" href="{{route('admin.technologies.show' , $technology->id )}}">visualizza tecnologia</a></td>
       </tr>
        @endforeach 
         
    </tbody>
  </table>

   <a href="{{route('admin.technologies.create')}}" class="btn btn-primary">Aggiungi tecnologia</a>
 
</div>
@endsection