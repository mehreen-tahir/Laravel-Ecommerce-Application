<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products',function($table)
		{
			$table->increments('id');
			$table->integer('category_id')->unsigned();//foreign key
			
			$table->string('title');
			$table->text('des');
			$table->decimal('price',6,2);//6 dig 2 dec.places
			$table->boolean('avalib')->default(1);
			$table->string('image');//img path
			$table->timestamps();

			$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
		});	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}
