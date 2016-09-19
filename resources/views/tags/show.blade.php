@extends('main')
@section('title'," | $tag->name Tag")
@section('content')
<div class="row">
	<div class="col-md-8">
		<h2>{{ $tag->name }}<small> {{ $tag->posts()->count()}} Posts</small></h2>
	</div>
	<div class="col-md-2">
		<a href="{{route('tags.edit', $tag->id)}}" class="btn btn-primary btn-lg btn-block btn-h1-spacing" >Edit Tag</a>
	</div>
	<div class="col-md-2">
		{!! Form::open(['route'=>['tags.destroy', $tag->id], 'method'=>'DELETE']) !!}
		{{ Form::submit('Delete Tag', ['class'=>'btn btn-danger btn-lg btn-block btn-h1-spacing'])}}
		{!! Form::close() !!}
	</div>
	<div class="col-md-12">
		<hr>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<th>#</th>
				<th>Post</th>
				<th>Tags</th>
				<th></th>
			</thead>
			<tbody>
				@foreach($tag->posts as $post)
					<tr>
						<td>{{$post->id}}</td>
						<td>{{substr($post->title, 0, 50) }}{{ strlen($post->title) > 50 ? "..." : ""}}</td>
						<td>
							@foreach($post->tags as $tag)
							<span class="label label-default">{{ $tag->name }}</span>
							@endforeach
						</td>
						<td><td><a href="{{route('posts.show', $post->id)}}" class="btn btn-xs btn-default">View</a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<div class="text-center">
			{{-- {!! $posts ->links()!!} --}}
		</div>
	</div>
</div>
@endsection