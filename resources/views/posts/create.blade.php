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
          <h5 class="card-title"> CREATE POST </h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <a href="{{route('posts.index')}}" class="btn btn-primary"> POSTS </a>
        </div>
      </div>
    
</div>
    </div>
    <br/>
    <div class="row">
      <div class="col"> 
        <form method="POST" action="{{route('posts.store')}}"  enctype="multipart/form-data">       
             @csrf
          <div class="form-group">
            @if(count($errors)>0)
            @foreach ($errors->all() as $error)
            <div class='alert alert-danger'>
              {{$error}}
            </div>
            @endforeach
            @endif
          </div>
          <div class="mb-3">

          <label for="exampleFormControlInput1" class="form-label" >TITLE</label>
          <input type="text" class="form-control" name="title" placeholder="input title">
        </div>
        <div class="mb-3">

        <label for="exampleFormControlInput1" class="form-label" >PHOTO</label>
          <input type="file" class="form-control" name="photo" placeholder="">
          <br/>
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">CONTENT</label>
          <textarea class="form-control" name="content" rows="3"></textarea>

          <br/>
          <button type="submit" class="btn btn-danger">Submit</button>
        </form>
@endsection