@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card text-center">
      <div class="col">
        <div class="col"><div class="card">
          <div class="card-header">
            Index
          </div>
          <div class="card-body">
            <h5 class="card-title">  POSTS </h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="{{route('posts.create')}}" class="btn btn-primary" role="button"> Create Post</a>
            <a href="{{route('posts.trashed')}}" class="btn btn-danger" role="button"> trashed Post</a>

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
                <a href="{{route('posts.show',['slug'=>$item->slug])}}" class="btn btn-primary" role="button"> Show </a>
                <a href="{{route('posts.edit',['id'=>$item->id])}}" class="btn btn-warning" role="button"> Edit </a>
                <a href="{{route('posts.destroy',['id'=>$item->id])}}" class="btn btn-danger" role="button" type="submit" >Delete</a>

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