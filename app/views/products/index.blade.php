@extends('layouts.main')

@section('content')

 <div id="admin">
 	<h1>Products Admin Panel</h1>
 	<hr>
 	<p>Here you can View, Delete and Create new Products</p>

 	<h2>Products</h2>
 	<hr>
 	<ul>
 		@foreach($product_in_view as $prod)
 		<li>
 			{{HTML::image($prod->image,$prod->title,array('width' =>'50'))}}
 			{{ $prod->title }} -
 			{{ Form::open(array('url' => 'admin/products/destroy' , 'class' => 'form-inline')) }}
 			{{ Form::hidden('id',$prod->id) }}
 			{{ Form::submit('Delete') }}
 			{{ Form::close() }}
  			
  			{{ Form::open(array('url' => 'admin/products/toggle-avalability' , 'class' => 'form-inline')) }}
 			{{ Form::hidden('id',$prod->id) }}
 			{{ Form::select('avalib',array('1'=>'In Stock','0'=>'Out Of Stock'),$prod->avalib) }}
 			{{ Form::submit('Update')}}
 			{{ Form::close() }}
  	
 		</li>
 		@endforeach
 	</ul>
 	
 	

 	<h2>Create new Products</h2>
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

	{{ Form::open(array('url'=>'admin/products/create','files'=>true) ) }}
		<p>
		 	 	{{ Form::label('category_id','Category') }}
		 	 	{{ Form::select('category_id',$categories_in)}}
		 </p>		
		 <p>

		 	 	{{ Form::label('title') }}
		 	 	{{ Form::text('title')  }}
		 </p>
		 
		<p>

		 	 	{{ Form::label('description') }}
		 	 	{{ Form::text('des')  }}
		 </p>
		 <p>

		 	 	{{ Form::label('price') }}
		 	 	{{ Form::text('price',null,array('class'=>'form-price'))  }}
		 </p>
		 <p>

		 	 	{{ Form::label('image','Choose an Image') }}
		 	 	{{ Form::file('image')  }}
		 </p>

	 {{ Form::submit('Create product',array('class'=>'secondary-cart-btn')) }}
	 {{ Form::close() }}	
</div>

@stop 
