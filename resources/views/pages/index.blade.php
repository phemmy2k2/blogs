@extends('main')
@section('title',' | Welcome')
@section('content')
    <div class="row">
      <div class="col-md-12">
        <div class="jumbotron">
          <p class="lead">Welcome! This is my first laravel application! </p>
          <a href="#" class="btn btn-primary btn-lg" role="button">Popular Post</a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
        <div class="post">
          @foreach($posts as $post)
            <h2>{{ $post->title}}</h2>
            <p>{{ $post->body}}</p>
            <a href="{{url('blog/'. $post->slug)}}" class="btn btn-primary">Read More</a>
          @endforeach
          
        </div>
        <hr>
      </div>
      
      <div class="col-md-3 col-md-offset-1">
        <h2>Trending Posts</h2>
      </div>
    </div>
      
@endsection