@extends('layouts.main')

@section('content')
<div id="new-account">
<h1>Create new Account</h1>
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
{{ Form::open(array('url'=>'users/create')) }}
<p>
	 	{{ Form::label('First Name') }}
		{{ Form::text('f_name')  }}
	
</p>
<p>
	 	{{ Form::label('Last Name') }}
		{{ Form::text('l_name')  }}
	
</p>
<p>
	 	{{ Form::label('Email') }}
		{{ Form::text('email')  }}
	
</p>
<p>
	 	{{ Form::label('Password') }}
		{{ Form::password('pass')  }}
	
</p>
<p>
	 	{{ Form::label('Password Confirmation') }}
		{{ Form::password('pass_confirmation')  }}
	
</p>
<p>
	 	{{ Form::label('Telephone') }}
		{{ Form::text('phone')  }}
	
</p>
 {{ Form::submit('Create New Account',array('class'=>'secondary-cart-btn')) }}
		 {{ Form::close() }}	
</div>
@stop