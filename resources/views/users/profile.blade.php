@extends('layouts.app')
@section('content')


<div class="card text-center">

    <div class="card-header">
      Featured
    </div>
    <div class="card-body">
      <h5 class="card-title">Your Profile</h5>
      <p class="card-text">With supporting text below as a natural lead-in to profile content.</p>
      <a href="#" class="btn btn-primary"> Go somewhere </a>

    </div>
    <div class="card-footer text-muted">
      2 days ago
    </div>
  </div>
  <br/>
  <br/>
  <form method="POST" action="{{route('profile.update')}}">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label"> Name </label>
      <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label"> Country </label>
      <input type="text" class="form-control" id="country" name="country" value="{{$user->Profile->country}}">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label"> Gender </label>
      <input type="text" class="form-control" id="gender" name="gender" value="{{$user->Profile->gender}}">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label"> Facebook </label>
      <input type="text"  class="form-control" id="facebook" name="facebook" value="{{$user->Profile->facebook}}">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label"> Job </label>
      <textarea class="form-control" id="job" name="job" >{{$user->Profile->job}}</textarea>
    </div>
  


  <button type="submit" class="btn btn-success">Update</button>
</form>
@endsection