<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::create('users',function($table)
		{
			$table->increments('id');
			$table->string('f_name');
			$table->string('l_name');
			$table->string('pass');
			$table->string('phone');
			$table->string('email');
			$table->boolean('admin')->default(0);//not admin
			$table->timestamps();

		});	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
