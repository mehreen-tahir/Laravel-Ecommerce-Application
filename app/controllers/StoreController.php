<?php

class StoreController extends \BaseController {

	public function __construct()
	{
		parent::__construct();
		$this->beforeFilter('csrf',array('on'=>'post'));
		$this->beforeFilter('auth',array('only'=>array('postAddtocart','getCart','getRemoveitem')));
	}
	
	public function getIndex()
	{
		return View::make('store.index')->with('product',Product::take(4)->orderBy('created_at','DESC')->get());
	}
 
	public function getView($id)
	{
		return View::make('store.view')->with('product',Product::find($id)); 
	}
	public function getCategory($categ_id)
	{
		return View::make('store.category')
				->with('product',Product::where('category_id', '=',$categ_id)->paginate(6))
				->with('categ_name',Category::find($categ_id)); 
	}
	public function getSearch()
	{
		$key=Input::get('keyword');
		return View::make('store.search')
				->with('product',Product::where('title','LIKE','%'.$key.'%')->get())
				->with('key_name',$key); 
	}
	 /*CARTS*/
	 public function postAddtocart()
	 {
		$product=Product::find(Input::get('id'));
		$quan=Input::get('qauntity');

		Cart::insert(array(
			'id'=>$product->id,
			'name'=>$product->title,
			'price'=>$product->price,
			'quantity'=>$quan,
			'image'=>$product->image
			));
		return Redirect::to('store/cart');
	 }
	 
	 public function getCart()
	 {
	 	return View::make('store.cart')
				->with('products',Cart::contents());
	 }

	 public function getRemoveitem($id)//get refrence to this obj in cart
	 {
	 	$item_= Cart::item($id);
	 	$item_->remove();
	 	return Redirect::to('store/cart');
	 }
}
