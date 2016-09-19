@extends('main')
@section('title',' | Category')
@section('style')
{!! Html::style('css/parsley.css')!!}
@endsection
@section('content')

<div class="row">
	<div class="col-md-8">
	<h2>Category</h2>
		<table class="table">
			<thead>
				<th>#</th>
				<th>Category</th>
				<th></th>
			</thead>
			<tbody>
				@foreach($categories as $category)
					<tr>
						<th>{{$category->id}}</th>
						<td>{{$category->name}}</td>
						<th><span>
							{!! Form::open(['route'=>['categories.destroy', $category->id], 'method'=>'DELETE']) !!}
							{!! Form::submit('Delete', ['class'=>'btn btn-danger btn-xs'])!!}
							{!! Form::close() !!}
						</span></th>
					</tr>
				@endforeach
			</tbody>
		</table>
		
	</div> <!-- End of .col-md-8-->
	<div class="col-md-3 col-md-offset-1">
		<div class="well">
			{!!Form::open(['route'=>'categories.store', 'data-parsley-validate'=>''])!!}
			{{ Form::label('name','Category')}}
			{{ Form::text('name', null, ['class'=>'form-control', 'required'=>'', 'maxlength'=>'255'])}}
			{{ Form::submit('Create New Category', ['class'=>'btn btn-primary btn-block btn-h1-spacing'])}}
			{!!Form::close()!!}
		</div>
	</div>
</div>
@endsection
@section('script')
{!! Html::script('js/parsley.min.js')!!}
@endsection