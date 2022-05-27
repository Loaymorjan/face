@extends('layouts.app')
@section('content')

<div class="container">
  <div class="card text-center">

  

    <div class="col">
      <div class="col"><div class="card">
        <div class="card-header">
          CREATE
        </div>
        <div class="card-body">
          <h5 class="card-title"> CREATE PRODUCT </h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <a href="{{route('posts.index')}}" class="btn btn-primary"> POSTS </a>
        </div>
      </div>
    
</div>
    </div>
    <div class="card-header">
      POST
    </div>
    <div class="card-body">
      <h2 class="card-title"> {{$post->title}} </h2>
      <h5 class="card-title"> {{$post->content}} </h5>
      <img src="{{($post->photo)}}"   width="100" height="100">  
    <div class="card-footer text-muted">
      WELOME TO Page
    </div>
  </div>
  </div>
@endsection