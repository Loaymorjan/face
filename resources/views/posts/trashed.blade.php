@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card text-center">
      <div class="col">
        <div class="col"><div class="card">
          <div class="card-header">
            TRASHED POSTS 
          </div>
          <div class="card-body">
            <h5 class="card-title"> TRASHED POSTS </h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="{{route('posts.index')}}" class="btn btn-danger" role="button"> Posts </a>

          </div>
        </div>
  </div>
      </div>
      <br/>
      <div class="row">
          @if($posts->count()>0)
        <div class="col">

      <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">Date</th>
            <th scope="col">user</th>
            <th scope="col">photo</th>
            <th scope="col">controller</th>

          </tr>
        </thead>
        <tbody>
            @php 
            $i=1
            @endphp
            @foreach ( $posts as $item )
                
          <tr>
            <th scope="row">{{$i++}}</th>
            <td>{{$item->title}}</td>
            <td>{{$item->created_at->diffForhumans()}}</td>
            <td>{{$item->user->name}}</td>
            <td>
            <img src="{{($item->photo)}}"  alt="{{$item->photo}}" class="img-tumbnull" width="100" height="100">  
            </td>
            <td>
                <a href="{{route('posts.restor',['id'=>$item->id])}}" class="btn btn-warning" role="button"> Restor </a>
                <a href="{{route('posts.hdelete',['id'=>$item->id])}}" class="btn btn-danger" role="button"> hdelete </a>

            </td>
          </tr>
          @endforeach

        </tbody>
      </table>
        </div>
            
        @else
        <div class="col">
        <div class="alert alert-danger" role="alert">
            NO POSTS !
          </div>
        </div>
        @endif
      </div>
@endsection