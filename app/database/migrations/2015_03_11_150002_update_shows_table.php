<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateShowsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//Schema::drop("shows");
		Schema::create("shows", function($table)
		{
			$table->increments('id');
			$table->string('showname');
			$table->longText('description');
			$table->text('hosts');
			$table->time('starttime');
			$table->time('endtime');
			$table->string('showday')->default("Sunday");
			$table->boolean('optin_sotw')->default(true);
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
		//
	}

}
