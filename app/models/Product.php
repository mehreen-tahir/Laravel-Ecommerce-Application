<?php 
class Product extends Eloquent
{

protected $fillable= array('category_id','title','des','price','avalib','image');

public static $rules_for_valid=array(
	'category_id'=>'required|integer',
	'title'=>'required|min:2',
	'des' =>'required|min:10',
	'price'=>'required|numeric',
	'avalib'=>'integer',
	'image' =>'required|image|mimes:jpeg,png,jgp,bmp,gif'



	);

public function Category()
	{
		return $this->belongsTo('Category');
	}
}

