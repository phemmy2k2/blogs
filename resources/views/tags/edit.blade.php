@extends('main')
@section('title', "| Edit $tag->name")
@section('content')
<hr>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		{!!Form::model($tag, ['route'=>['tags.update', $tag->id], 'method'=>'PUT'])!!}
		<h3>Edit Tag</h3>
		{{ Form::label('name','Name:')}}
		{{ Form::text('name', null, ['class'=>'form-control'])}}
		{{ Form::submit('Save Changes', ['class'=>'btn btn-primary btn-block btn-h1-spacing'])}}
		{!!Form::close()!!}
	</div>
	
</div>
@endsection

