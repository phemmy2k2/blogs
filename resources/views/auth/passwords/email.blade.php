@extends('main')
@section('title', "| Forget Password")
@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="panel-heading">Reset Password</div>
			<div class="panel-body">

			@if(session('status'))

			<div class="alert alert-success">
				{{ session('status')}}
			</div>


			@endif
				{!! Form::open(['url'=>'password/email', 'method'=>'post'])!!}

				{{Form::label('email', 'Enter your email:')}}
				{{Form::email('email', null, ['class'=>'form-control'])}}

				{{Form::submit('Reset Password', ['class'=>'btn btn-primary btn-h1-spacing text'])}}
				{!!Form::close()!!}
			</div>
			
		</div>
	</div>
	
</div>
@endsection