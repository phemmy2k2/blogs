@extends('main')
@section('title',' | Tag Index')
@section('content')

<div class="row">
	<div class="col-md-8">
	<h2>Tags</h2>
		<table class="table">
			<thead>
				<th>#</th>
				<th>Tags</th>
			</thead>
			<tbody>
				@foreach($tags as $tag)
					<tr>
						<th>{{$tag->id}}</th>
						<td><a href="{{route('tags.show', $tag->id)}}">{{$tag->name}}</a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
		
	</div> <!-- End of .col-md-8-->
	<div class="col-md-4">
		<div class="well">
			{!!Form::open(['route'=>'tags.store'])!!}
			<h3>Tags</h3>
			{{ Form::label('name','Name:')}}
			{{ Form::text('name', null, ['class'=>'form-control'])}}
			{{ Form::submit('Create New Category', ['class'=>'btn btn-primary btn-block btn-h1-spacing'])}}
			{!!Form::close()!!}
		</div>
	</div>
</div>
@endsection