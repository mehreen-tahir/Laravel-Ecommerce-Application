@extends('layouts.main')

@section('content')

 <div id="admin">
 	<h1>Categories Admin Panel</h1>
 	<hr>
 	<p>Here you can View, Delete and Create new Categories</p>

 	<h2>Categories</h2>
 	<hr>
 	<ul>
 		@foreach($category_in_view as $categ)
 		<li>
 			{{ $categ->name }} -
 			{{ Form::open(array('url' => 'admin/categories/destroy' , 'class' => 'form-inline')) }}
 			{{ Form::hidden('id',$categ->id) }}
 			{{ Form::submit('Delete') }}
 			{{ Form::close() }}
  	
 		</li>
 		@endforeach
 	</ul>
 	
 	

 	<h2>Create new category</h2>
 	<hr>
 	 @if($errors->has())
 	 
 	 <div id="form-errors">
 	 	<p>The following errors have occured:</p>
 	 	<ul>
 	 		@foreach($errors->all() as $err)
 	 		<li>
 	 			{{ $err }}
 	 		</li>
 	 		@endforeach
 	 	</ul>
 	 </div>
	@endif

	{{ Form::open(array('url'=>'admin/categories/create')) }}
		<p>
		 	 	{{ Form::label('name') }}
		 	 	{{ Form::text('name') }}
		 </p>		

		 {{ Form::submit('Create Category',array('class'=>'secondary-cart-btn')) }}
		 {{ Form::close() }}	
</div>

@stop 
