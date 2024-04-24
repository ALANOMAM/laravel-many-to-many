@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <h1>PAGINA INDEX DEI POSTS</h1>
    {{---@dd($posts)---}}


   <table class="table">
    <thead>
      <tr>
        <th scope="col">Nomi Files</th>
        <th scope="col"></th>
      </tr>
    </thead>

    <tbody>
       
        @foreach ($posts as $post)
        <tr>      
        <td>{{$post->id}} - {{$post->Nome}}</td>
        
        <td><a class="btn btn-success" href="{{route('admin.posts.show' , $post->id )}}">visualizza post</a></td>
       </tr>
        @endforeach
        
    </tbody>
  </table>

  <a href="{{route('admin.posts.create')}}" class="btn btn-primary">Aggiungi post</a>
 
</div>
@endsection