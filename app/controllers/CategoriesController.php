<?php

class CategoriesController extends \BaseController {

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
		//display all category.
		return View::make('categories.index')->with('category_in_view',Category::all());
	}

	
	public function postCreate()
	{
		// form for new catgey after validating it 
		// validator make(input that has to be validate,rules for validation)
		$validator = Validator::make(Input::all(),Category::$rules_for_valid);
		
		if($validator->passes())
		{
			//create new categ n save
			$category=new Category;
			$category->name=Input::get('name');
			$category->save();

			return Redirect::to('admin/categories/index')
			->with('message','Category sucesfully created');
		}

			return Redirect::to('admin/categories/index')
			->with('message','Something went wrong! Category not created ')
			->withErrors($validator)
			->withInput();
	}


	public function postDestroy()
	{
		$category=Category::find(Input::get('id'));
		
		if($category)	 // categ existed
		{
 				$category->delete();
 					return Redirect::to('admin/categories/index')
					->with('message','Category Deleted Sucessfully!');
		}
			return Redirect::to('admin/categories/index')
			->with('message','Something went wrong! Category not deleted.');
	
	}
	



}
