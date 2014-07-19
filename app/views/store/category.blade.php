@extends('layouts.main')

@section('content_promote')

<section id="promo-alt">
    <div id="promo1">
        <h1>The brand new MacBook Pro</h1>
        <p>With a special price, <span class="bold">today only!</span></p>
        <a href="#" class="secondary-btn">READ MORE</a>
        {{HTML::image('img/macbook.png','MacBook Pro')}}
    </div><!-- end promo1 -->
    <div id="promo2">
        <h2>The iPhone 5 is now<br>available in our store!</h2>
        <a href="">Read more {{HTML::image('img/right-arrow.gif','Read more')}}</a>
        {{HTML::image('img/iphone.png','iPhone')}}
    </div><!-- end promo2 -->
    <div id="promo3">
        {{HTML::image('img/thunderbolt.png','Thunderbolt')}}
        <h2>The 27"<br>Thunderbolt Display.<br>Simply Stunning.</h2>
        <a href="#">Read more
        {{HTML::image('img/right-arrow.gif','Read more')}}</a>
    </div><!-- end promo3 -->
</section><!-- promo-alt -->

@stop

@section('content')
 <h2>{{$categ_name->name}}</h2>
                <hr>

                <aside id="categories-menu">
                    <h3>CATEGORIES</h3>
                    <ul>
                    	@foreach($catnav as $categ)
							<li>{{HTML::link('/store/category/'.$categ->id,$categ->name)}}<li>
                        @endforeach
                    </ul>
                </aside><!-- end categories-menu -->

    
        <div id="listings">
	     	@foreach($product as $pro)

			<div class="product">
			<a href="/store/view/ {{$pro->id}}">
			{{HTML::image($pro->image,$pro->title,array('class'=>'feature','width'=>'240','height'=>'127')) }}
			</a>

			<h3><a href="/store/view/ {{$pro->id}}">{{$pro->title}}</a></h3>

			<p>{{$pro->des}}</p>

			<h5>Availability: 
			    <span class="{{Availability::displayClass($pro->avalib)}}">
			                {{Availability::display($pro->avalib)}}
			    </span>
			</h5>

			
            <p>
                    {{ Form::open(array('url' => 'store/addtocart' )) }}
                    
                    {{ Form::hidden('qauntity','1') }}
                    {{ Form::hidden('id',$pro->id) }}
                   <button type="submit" class="cart-btn">
                      <span class="price">{{ $pro->price }}</span>
                          {{HTML::image('img/white-cart.gif','Add to Cart')}}
                          ADD TO CART
                   </button> 
                    {{ Form::close() }}
            </p>
            
			</div>
			@endforeach

                </div>
@stop

@section('content_page')
 <section id="pagination">
    {{$product->links()}}
</section> 
@stop