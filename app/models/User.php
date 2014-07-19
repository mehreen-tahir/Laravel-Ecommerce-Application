<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('pass');//, 'remember_token');
	protected $fillable= array('f_name','l_name','email','phone');
	public static $rules_for_valid=array(
		'f_name'=>'required|min:2|alpha',
		'l_name'=>'required|min:2|alpha',
		 'email'=>'required|email|unique:users',
		 'pass'=>'required|alpha_num|between:8,12|confirmed',
		 'pass_confirmation'=>'required|between:8,12|alpha_num',
		 'phone'=>'required|between:10,12',
		 'admin'=>'integer'

		);

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->pass;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}


}
