@extends('main')
@section('title', '| Delete Comment')
@section('content')
<hr>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<p>
			<strong>Name:</strong><span>{{ $comment->name }}</span> <br>
			<strong>Email:</strong><span>{{ $comment->email }}</span> <br>
			<strong>Comment:</strong><span>{{ $comment->comment }}</span> <br>
		</p>
		{!!Form::open(['route'=>['comments.destroy', $comment->id], 'method'=>'DELETE'])!!}
		
		{{ Form::submit('Yes, DELETE Comment', ['class'=>'btn btn-danger btn-block btn-h1-spacing'])}}
		{!!Form::close()!!}
	</div>
	
</div>
@endsection
