<!--QUESTA PAGINA E COLLEGATA ALLA ROTTA E AL DASHBOARD CONTROLLER. 
    E QUELLA CHE VEDO APPENA FACCIO IL LOGIN-->

@extends('layouts.app')

@section('content')

<div class="container py-5">

    <h1>Pagina di amministrazione</h1>

    <h2>Benvenuto  <strong>{{$user->name}}</strong></h2>
    {{-- @dump($user) --}}


    <div class="d-flex flex-column align-items-start gap-3">
        <a href="{{route('admin.posts.index')}}" class="btn btn-info">Vai a vedere la lista degli elementi</a>
        <a href="{{route('admin.types.index')}}" class="btn btn-info">Vai a vedere la lista dei tipi</a>
        <a href="{{route('admin.users')}}" class="btn btn-info">Vai a vedere la lista degli admin</a>
    </div>
    
</div>

@endsection