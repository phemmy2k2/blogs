@extends('main')
@section('title',' | Show Post')
@section('content')
<hr>
<div class="row">
	<div class="col-md-8">
		<h2> {{$post->title}} </h2>

		<p class="lead">{!! $post->body !!}</p>

		<div class="tag">
			@foreach($post->tags as $tag)
				<span class="label label-default">{{ $tag->name }}</span>
			@endforeach
		</div>
		<h2> <small>{{ $post->comments->count() }}</small> Comments</h2>
		<div>
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Email</th>
					<th>Comment</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($post->comments as $comment)
				<tr>
					<th>{{ $comment->id }}</th>
					<td>{{ $comment->name }}</td>
					<td>{{ $comment->email }}</td>
					<td>{{ $comment->comment }}</td>
					<td>
					{{-- set the routes for the following links --}}
					<span><a href="{{ route('comments.edit', $comment->id)}}" class="btn btn-xs btn-primary">Edit</a></span><span><a href="{{ route('comments.delete', $comment->id)}}" class="btn btn-xs btn-danger">Delete</a></span>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	</div>
	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
				<p>Url:</p>
				<a href="{{url('blog/' . $post->slug)}}">{{url('blog/' . $post->slug)}}</a> 
			</dl>
			<dl class="dl-horizontal">
				<p>Category:</p>
				<p>{{$post->category->name}}</p> 
			</dl>
			<dl class="dl-horizontal">
				<p>Created At:</p>
				<p>{{date('M j, Y H:i', strtotime($post->created_at))}}</p>
			</dl>
			<dl class="dl-horizontal">
				<p>Update At:</p>
				<p>{{date('M j, Y H:i', strtotime($post->updated_at))}}</p>
			</dl>
		</div>
		<div class="col-sm-6">
			{!! Html::linkRoute('posts.edit','Edit', [$post->id], ['class'=>'btn btn-primary btn-block']) !!}
		</div>
		<div class="col-sm-6">
			{!! Form::open(['route'=>['posts.destroy', $post->id], 'method'=>'DELETE']) !!}
			{!! Form::submit('Delete', ['class'=>'btn btn-danger btn-block'])!!}
			{!! Form::close() !!}
		</div>
		<div class="col-md-12">
			{!! Html::linkRoute('posts.show','View all Posts', [''], ['class'=>'btn btn-default btn-block btn-h1-spacing']) !!}
		</div>
	</div>



	
</div>
@endsection