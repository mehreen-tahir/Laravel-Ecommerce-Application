<?php

class ProductsController extends \BaseController {

	public function __construct()
	{
		parent::__construct();
		$this->beforeFilter('csrf',array('on'=>'post'));
		$this->beforeFilter('admin'); //admin filter
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function getIndex()
	{
		$categories=array();

		foreach(Category::all() as $cat)
		{
			$categories[$cat->id]=$cat->name;
		}
		
		return View::make('products.index')->with('product_in_view',Product::all())
		->with('categories_in',$categories);
	}

	
	public function postCreate()
	{
		// form for new catgey after validating it 
		// validator make(input that has to be validate,rules for validation)
		$validator = Validator::make(Input::all(),Product::$rules_for_valid);
		
		if($validator->passes())
		{
			
			$prod=new Product;
			$prod->category_id=Input::get('category_id');
			$prod->title=Input::get('title');
			$prod->des=Input::get('des');
			$prod->price=Input::get('price');
			
			$image=Input::file('image');
			$filename=date('Y-m-d-H:i:s')."-".$image->getClientOriginalName();
			Image::make($image->getRealPath())->resize(468,249)->save('public/img/products/'.$filename);

			$prod->image='img/products/'.$filename;

			$prod->save();

			return Redirect::to('admin/products/index')
			->with('message','Product sucesfully created');
		}

			return Redirect::to('admin/products/index')
			->with('message','Something went wrong! Product not created ')
			->withErrors($validator)
			->withInput();
	}


	public function postDestroy()
	{
		$prod=Product::find(Input::get('id'));
		
		if($prod)	 
		{
					File::delete('public/'.$prod->image);

 					$prod->delete();
 					return Redirect::to('admin/products/index')
					->with('message','Product Deleted Sucessfully!');
		}
			return Redirect::to('admin/products/index')
			->with('message','Something went wrong! Product not deleted.');
	
	}
	
	public function postToggleAvalability()
	{
		$pro=Product::find(Input::get('id'));
		if($pro)
		{
			$pro->avalib=Input::get('avalib');
			$pro->save();
			return Redirect::to('admin/products/index')
			->with('message','Product was updated.');
	
		}
				return Redirect::to('admin/products/index')
			->with('message','Something went wrong! Product not updated.');
	}


}
