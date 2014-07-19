@extends('layouts.main')

@section('content')
        <div id="shopping-cart">
            <h1>Shopping Cart & Checkout</h1>

            <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                <table border="1">
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Unit Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>

       @foreach($products as $pro)
              <tr>
                 <td>{{$pro->id}}</td>
                        <td>
                            {{HTML::image($pro->image,$pro->name,array('width'=>'65','height'=>'37'))}} 
                            {{$pro->name}} <!-- for carts item not db -->
                        </td>
                        <td>
                        	${{$pro->price}}
                        </td>
                        <td>
                        	{{$pro->quantity}} 
                        </td>
                        <td>
                        	${{$pro->price}}
                          <a href="/store/removeitem/{{ $pro->identifier 	}}"><!-- its in cart's identifer -->
                               {{HTML::image('img/remove.gif','Remove product')}}
                          </a>
                        </td>
                    </tr>
           @endforeach
                    <tr class="total">
                        <td colspan="5">
                            Subtotal: ${{Cart::total()}}<br />
                            <span>TOTAL: ${{Cart::total()}}</span><br />

                           	{{HTML::link('/','CONTINUE SHOPPING',array('class'=>'tertiary-btn'))}}
                            <input type="submit" value="CHECKOUT WITH PAYPAL" class="secondary-cart-btn">
                        </td>
                    </tr>
                </table>
            </form>
        </div><!-- end shopping-cart -->

@stop