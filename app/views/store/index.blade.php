@extends('layouts.main')

@section('content_promote')

    <section id="promo">
        <div id="promo-details">
            <h1>Today's Deals</h1>
            <p>Checkout this section of<br />
             products at a discounted price.</p>
            <a href="#" class="default-btn">Shop Now</a>
        </div><!-- end promo-details -->
        {{ HTML::image('img/promo.png','Promotional Ad')}}

    </section><!-- promo -->


@stop 



@section('content')

<h2>New Products</h2>
<hr>
<div id="products">
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
            {{ Form::hidden('id',$pro->id) }}
            {{ Form::hidden('qauntity','1') }}
           <button type="submit" class="cart-btn">
              <span class="price">{{$pro->price}}</span>
                  {{HTML::image('img/white-cart.gif','Add to Cart')}}
                  ADD TO CART
           </button> 
            {{ Form::close() }}
    </p>
</div>
@endforeach

</div>




@stop 