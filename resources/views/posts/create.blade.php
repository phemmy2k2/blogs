@extends('main')
@section('title',' | Create New Post')
@section('style')
{!! Html::style('css/parsley.css')!!}
{!! Html::style('css/select2.min.css')!!}
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ 
	selector:'textarea',
	plugins:'link code',
	menubar: false 
	});
</script>
@endsection
@section('content')
<h1> Create New Post</h1>
<hr>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		{!! Form::open(['route'=>'posts.store', 'data-parsley-validate'=>'']) !!}
		{{ Form::label('title', 'Title:') }}
		{{ Form::text('title', null, ['class'=>'form-control', 'required'=>'', 'maxlength'=>'255'])}}

		{{ Form::label('slug', 'Slug:') }}
		{{ Form::text('slug', null, ['class'=>'form-control', 'required'=>'', 'minlength'=>'5', 'maxlength'=>'255'])}}

		{{ Form::label('category_id', 'Category:') }}
		<select name="category_id" class="form-control" 'required'=''>
		@foreach($categories as $category)
			<option value={{$category->id}}> {{$category->name}}</option>
		@endforeach
		</select>

		{{ Form::label('name', 'Tag:') }}
		{{Form::select('name[]', $tags, null, ['class'=>'form-control select2-multi', 'multiple'=>'multiple'])}}

		{{ Form::label('body', 'Body:')}}
		{{ Form::textarea('body', null, ['class'=>'form-control'])}}

		{{ Form::submit('Submit',['class'=>'btn btn-success btn-lg btn-block', 'style'=>'margin-top:20px;'])}}

		{!! Form:: close() !!}
	</div>
</div>
@endsection
@section('script')
{!! Html::script('js/parsley.min.js')!!}
{!! Html::script('js/select2.min.js')!!}
<script type="text/javascript">
	$('.select2-multi').select2();
</script>
@endsection