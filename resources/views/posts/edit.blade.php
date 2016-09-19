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

<hr>
<div class="row">
	{!! Form::model($post,['route'=>['posts.update', $post->id], 'data-parsley-validate'=>'', 'method'=>'PUT']) !!}
		<div class="col-md-8">
			{{ Form::label('title', 'Title:') }}
			{{Form::text('title', null, ['class'=>'form-control input-lg', 'required'=>'', 'maxlength'=>'255'])}}

			{{ Form::label('slug', 'Slug:') }}
			{{Form::text('slug', null, ['class'=>'form-control', 'required'=>'', 'minlength'=>'5', 'maxlength'=>'255'])}}

			{{ Form::label('category_id', 'Category:') }}
			{{Form::select('category_id', $categories, null, ['class'=>'form-control', 'required'=>''])}}

			{{ Form::label('tags', 'Tag:') }}
			{{Form::select('tags[]', $tags, null, ['class'=>'form-control select2-multi', 'multiple'=>'multiple'])}}

			{{ Form::label('body', 'Post Body:') }}
			{{Form::textarea('body', null, ['class'=>'form-control'])}}
			
		</div>
		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>Created At:</dt>
					<dd>{{date('M j, Y H:i', strtotime($post->created_at))}}</dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Update At:</dt>
					<dd>{{date('M j, Y H:i', strtotime($post->updated_at))}}</dd>
				</dl>
			</div>
			<div class="col-sm-6">
				{{-- {!! Form::open(['route'=>['posts.update',$post->id]]) !!} --}}
				{{-- {{ Form::submit('Edit Post',['class'=>'btn btn-Primary btn-block'])}} --}}
				{{-- {!! Form::close() !!} --}}
				{{-- <a href="#" class="btn btn-primary btn-block">Edit</a> --}}
				{!! Html::linkRoute('posts.show','Cancel', [$post->id], ['class'=>'btn btn-danger btn-block']) !!}
			</div>
			<div class="col-sm-6">
				{!! Form::submit('Save Changes', ['class'=>'btn btn-success btn-block'])!!}
			</div>
		</div>
	{!! Form::close()!!}
</div>
@endsection
@section('script')
{!! Html::script('js/parsley.min.js')!!}
{!! Html::script('js/select2.min.js')!!}
<script type="text/javascript">
	$('.select2-multi').select2();
	$('.select2-multi').select2().val({!! json_encode($post->tags()->getRelatedIds())!!}).trigger('change');
</script>
@endsection