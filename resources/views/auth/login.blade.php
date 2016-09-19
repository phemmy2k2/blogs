@extends('main')

@section('title',' | User Login')


@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		{!! Form::open() !!}
		{{ Form::label('email', 'Email:') }}
		{{ Form::email('email', null, ['class'=>'form-control'])}}

		{{ Form::label('password', 'Password:')}}
		{{ Form::password('password', ['class'=>'form-control'])}}
		{{ Form::checkbox('remember')}} {{ Form::label('remember', 'Remember Me')}}

		{{ Form::submit('Submit',['class'=>'btn btn-success btn-lg btn-block', 'style'=>'margin-top:20px;'])}}
		<a href="{{url('password/reset')}}">Forgot my Password</a>
		{!! Form:: close() !!}
	</div>
</div>
@endsection