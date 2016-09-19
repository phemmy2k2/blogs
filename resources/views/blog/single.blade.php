@extends('main')
@section('title', "| $post->title")
@section('content')
<hr>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h2> {{$post->title}} </h2>

		<p class="lead">{!! $post->body !!}</p>
		<br>
		<p>Posted In: {{ $post->category->name}}</p>
	</div>

</div>
<div class="row">
<div class="col-md-8 col-md-offset-2">
<h3 class="comment-title"><span class="glyphicon glyphicon-comment"></span>{{ $post->comments()->count() }} Comments</h3>
@foreach($post->comments as $comment)

		<div class="comment">
			<div class="author-info">
			<img src="" class="author-image">
			<div class="author-name">
				<h4>{{ $comment->name }}</h4>
				<p class="author-time">{{ date('F nS, Y -g:iA ', strtotime($comment->created_at)) }}</p>
			</div>
			</div>
			
			<div class="comment-content">
				{{ $comment->comment }}
			</div>
		</div>
		@endforeach
	</div>
</div>

<div class="row">
	<div class="col-md-8 col-md-offset-2">

		{!! Form::open(['route'=>['comments.store', $post->id], 'method'=>'POST']) !!}
			<div class="row">
				<div class=" col-md-6">
				{{ Form::label('name', 'Name:') }}
				{{ Form::text('name', null, ['class'=>'form-control'])}}
				</div>
				<div class="col-md-6">
					{{ Form::label('email', 'Email:') }}
					{{ Form::email('email', null, ['class'=>'form-control'])}}
				</div>
				<div class="col-md-12">
					{{ Form::label('comment', 'Comment:') }}
					{{ Form::textarea('comment', null, ['class'=>'form-control', 'rows'=>'5'])}}
					{{ Form::submit('Save Comment', ['class'=>'btn btn-block btn-success btn-h1-spacing'])}}
				</div>
			</div>			
		{!! Form::close() !!}
	</div>
</div>
@endsection