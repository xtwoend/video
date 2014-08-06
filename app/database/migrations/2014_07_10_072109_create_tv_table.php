<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTvTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tvs', function($table)
        {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->datetime('schedule');
            $table->string('cover');
            $table->text('embedded_code');
            $table->integer('owner_id')->unsigned()->index();
            $table->timestamps();
            $table->softDeletes();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tvs');
	}

}
