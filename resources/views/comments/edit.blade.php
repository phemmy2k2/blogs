@extends('main')
@section('title', "| Edit Comment")
@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">

		{!! Form::model($comment, ['route'=>['comments.update', $comment->id], 'method'=>'PUT']) !!}

			<div class="row">
				<div class=" col-md-6">
				{{ Form::label('name', 'Name:') }}
				{{ Form::text('name', null, ['class'=>'form-control', 'disabled'=>''])}}
				</div>
				<div class="col-md-6">
					{{ Form::label('email', 'Email:') }}
					{{ Form::email('email', null, ['class'=>'form-control', 'disabled'=>''])}}
				</div>
				<div class="col-md-12">
					{{ Form::label('comment', 'Comment:') }}
					{{ Form::textarea('comment', null, ['class'=>'form-control', 'rows'=>'5'])}}
					{{ Form::submit('Save Changes', ['class'=>'btn btn-block btn-success btn-h1-spacing'])}}
				</div>
			</div>			
		{!! Form::close() !!}
	</div>
</div>
@endsection