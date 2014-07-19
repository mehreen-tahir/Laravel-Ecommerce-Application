<?php

class UsersController extends \BaseController {

	public function __construct()
	{
		parent::__construct();
		$this->beforeFilter('csrf',array('on'=>'post'));

	}
	
	public function getNewaccount()
	{
		return View::make('users.newaccount');
	}
 
	public function postCreate()
	{
		$validator = Validator::make(Input::all(),User::$rules_for_valid);
		
		if($validator->passes())
		{
			$us=new User;
			$us->f_name=Input::get('f_name');
			$us->l_name=Input::get('l_name');
			$us->pass=Hash::make(Input::get('pass'));
			$us->phone=Input::get('phone');
			$us->email=Input::get('email');
			$us->save();

		 return Redirect::to('users/signin')
			->with('message','Thankyou for creating new account! kindly Sign in');
		}
		
		return Redirect::to('users/newaccount')
			->with('message','Something went wrong! kindly Sign up again')
			->withErrors($validator)
			->withInput();	
	}

	public function getSignin()
	{
		return View::make('users.signin');	
	}

	public function postSignin()
	{
	if(Auth::attempt(array('email'=>Input::get('email'),'password'=>Input::get('pass'))))
	{
		return Redirect::to('/')
			->with('message','Thanks for singning in!');
		}
		 return Redirect::to('users/signin')
			->with('message','Email/password was incorrent.Try again!');
	}

	public function getSignout()
	{
		Auth::logout();
		 return Redirect::to('users/signin')
			->with('message','You have been signed out!');
	}
 	
}
