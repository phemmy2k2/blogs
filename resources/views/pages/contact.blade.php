@extends('main')
@section('title',' | Contact')
@section('style')
{!! Html::style('css/parsley.css')!!}
@endsection
@section('content')
<h1> Contact Dairy912</h1>
<hr>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		{!! Form::open(['url'=>'contact', 'data-parsley-validate'=>'']) !!}
		{{ Form::label('subject', 'Subject:') }}
		{{ Form::text('subject', null, ['class'=>'form-control','required'=>'', 'maxlength'=>'255'])}}
		{{ Form::label('email', 'Email:') }}
		{{ Form::email('email', null, ['class'=>'form-control','required'=>''])}}
		{{ Form::label('body', 'Body:')}}
		{{ Form::textarea('body', null, ['class'=>'form-control', 'minlength'=>'10']) }}

		{{ Form::submit('Submit',['class'=>'btn btn-success btn-lg btn-block', 'style'=>'margin-top:20px;'])}}

		{!! Form:: close() !!}
	</div>
</div>
@endsection
@section('script')
{!! Html::script('js/parsley.min.js')!!}
@endsection